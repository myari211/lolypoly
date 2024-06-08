<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Transaction;
use App\Helpers\GeneralFunction;
use DateTime;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class PorductController extends Controller
{

    public function index()
    {
        $this->data['data_config'] = '';
        $this->data['data_category'] = Category::where('row_status', '1')->orderBy('title', 'ASC')->get();

        return view('admin.product.index', $this->data);
    }

    public function create()
    {
        $this->data['data_config'] = '';
        $this->data['data_category'] = Category::where('row_status', '1')->orderBy('title', 'ASC')->get();

        return view('admin.product.add', $this->data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $path = 'uploads/product';
            $images_thumbnail = $request->images_thumbnail;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
            }
            $slug = GeneralFunction::slug($request->title);
            $check = Product::where('slug', $slug)->count();
            $slug_fix = $check > 0 ? $slug . ' - ' . $check + 1 : $slug;
            $data = array(
                "title" => $request->title,
                "weight" => $request->weight,
                "slug" => $slug_fix,
                "description" => $request->description,
                "image" => $images_thumbnail_name,
                'row_status' => '1',
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $result = Product::create($data);
            $product_id = $result->id;

            if (isset($request->category_id)) :
                if (count($request->category_id) > 0) :
                    foreach ($request->category_id as $category_id) {
                        $data_category = array(
                            'product_id' => $product_id,
                            'category_id' => $category_id,
                            'row_status' => '1',
                            'created_by' => GeneralFunction::myId(),
                            'updated_by' => GeneralFunction::myId(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        );
                        ProductCategory::create($data_category);
                    }
                endif;
            endif;

            //add variant
            if(isset($request->variant)) {
                if(count($request->variant) > 0) {
                    foreach($request->variant as $variant) {
                        $variant = array(
                            "id" => Uuid::uuid4()->toString(),
                            "product_id" => $product_id,
                            "category" => $request->variant_category,
                            "value" => $request->variant_value,
                            "stock" => $request->variant_stock,
                            "created_at" => Carbon::now(),
                            "updated_at" => Carbon::now(),
                        );
                        $create_variant = DB::table('10_product_variants')->insert($variant);
                    }
                }
            }

            if (isset($request->images)) :
                if (count($request->images) > 0) :
                    foreach ($request->images as $image) {
                        $file1 = $image;
                        $path1 = 'uploads/product/';
                        if (isset($file1)) {
                            $dataImage1 = GeneralFunction::uploadImage($path, $file1);
                        } else {
                            $dataImage1 = 'assets/images/default.jpg';
                        }
                        $data_image = array(
                            'product_id' => $product_id,
                            'image' => $dataImage1,
                            'row_status' => '1',
                            'created_by' => GeneralFunction::myId(),
                            'updated_by' => GeneralFunction::myId(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        );
                        ProductImage::create($data_image);
                    }
                endif;
            endif;
            $redirectTo = url('admin/product/edit') . '/' . $product_id;
            $message = 'Successfully Created Data';
            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => $redirectTo, 'data' => $result], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function edit($id)
    {
        $this->data['data_config'] = '';
        $this->data['data_category'] = Category::where('row_status', '1')->orderBy('title', 'ASC')->get();
        $data_product = Product::with('productCategory', 'productImage')
            ->where('row_status', '=', '1')
            ->where('id', $id)
            ->first();
        $this->data['data_product'] = $data_product;
        $this->data['data_category'] = GeneralFunction::getAllCategoryProduct($id);

        return view('admin.product.edit', $this->data);
    }
    public function editvarian($id)
    {
        try {
            $data_variant = ProductVariant::where('row_status', '=', '1')
                ->where('id', $id)
                ->first();

            $data_type = ProductType::where('row_status', '=', '1')
                ->where('id', isset($data_variant) ? $data_variant->product_type_id : $id)
                ->first();

            $res = array(
                // 'id' => $data_variant->id,
                'data_variant_id' => isset($data_variant) ? $data_variant->id : '',
                'data_type_id' => $data_type->id,
                'type' => $data_type->title,
                'variant' => isset($data_variant) ? $data_variant->title : '',
                'min_stock_variant' => $data_type->min_stock,
                'stock_variant' => $data_type->stock,
                'price_variant' => isset($data_variant) ? $data_variant->price : $data_type->price,
            );
            return response()->json([
                'code' => 200,
                'message' => 'Successfully',
                'data' => $res
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'code' => 500,
                'message' => 'Wops, something went wrong.',
                'error_message' => $e->getMessage()
            ], 200);
        }
    }

    public function update(Request $request, $id_encode)
    {
        DB::beginTransaction();
        try {
            $path = 'uploads/product';
            $images_thumbnail_name = '';
            $images_thumbnail = $request->images_thumbnail;
            $images_update = $request->image_file;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
            } elseif (isset($images_update)) {
                $images_thumbnail_name = $images_update;
            }
            if (isset($request->hasvariant)) {
                $check_variant = ProductType::leftjoin('10_product_variant', '10_product_type.id', '=', '10_product_variant.product_type_id')
                    ->orderBy('10_product_type.updated_at', 'DESC')
                    ->select('10_product_type.*', '10_product_variant.title as type_name', '10_product_variant.id as id_varian', '10_product_variant.price as price_varian')
                    ->where('10_product_type.product_id', '=', $id_encode)
                    ->count();
                if ($check_variant == 0) {
                    return response()->json([
                        'code' => 500,
                        'message' => 'Please Inset at least one variant!',
                    ], 200);
                }
            }
            $slug = GeneralFunction::slug($request->title);
            $check = Product::where('slug', $slug)->count();
            $slug_fix = $check > 0 ? $slug . ' - ' . $check + 1 : $slug;
            $data = array(
                "title" => $request->title,
                "slug" => $slug_fix,
                "description" => $request->description,
                "image" => $images_thumbnail_name,
                'row_status' => '1',
                'min_stock' => $request->min_stock,
                'stock' => $request->stock,
                'price' => $request->price,
                'updated_by' => GeneralFunction::myId(),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $result = Product::where('id', $id_encode)->update($data);

            if (count($request->category_id) > 0) {
                ProductCategory::where('product_id', $id_encode)->delete();
                foreach ($request->category_id as $category_id) {
                    $data_category = array(
                        'product_id' => $id_encode,
                        'category_id' => $category_id,
                        'row_status' => '1',
                        'created_by' => GeneralFunction::myId(),
                        'updated_by' => GeneralFunction::myId(),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    ProductCategory::create($data_category);
                }
            }

            if (isset($request->images) && is_array($request->images) && count($request->images) > 0) {
                ProductImage::where('product_id', $id_encode)->delete();
                foreach ($request->images as $image) {
                    $file1 = $image;
                    $path1 = 'uploads/product/';
                    if (isset($file1)) {
                        $dataImage1 = GeneralFunction::uploadImage($path, $file1);
                    } else {
                        $dataImage1 = 'assets/images/default.jpg';
                    }
                    $data_image = array(
                        'product_id' => $id_encode,
                        'image' => $dataImage1,
                        'row_status' => '1',
                        'created_by' => GeneralFunction::myId(),
                        'updated_by' => GeneralFunction::myId(),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    ProductImage::create($data_image);
                }
            }

            $redirectTo = route('product.index');
            $message = 'Successfully Updated Data';
            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => $redirectTo, 'data' => $result], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something went wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function getAll(Request $request)
    {
        $data = Product::with('productCategory', 'productImage')
            ->where('row_status', '=', '1')
            ->whereNull('brand_id')
            ->orderBy('updated_at', "DESC")
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('category_name', function ($data) {
                $res_category_name = '';
                $count_category = count($data->productCategory);
                foreach ($data->productCategory as $key => $productCategory) {
                    $res_category_name .= ($key + 1 == $count_category) ? $productCategory->category->title : $productCategory->category->title . ', ';
                }
                return $res_category_name;
            })
            ->editColumn('stock', function ($data) {
                $stock = $data->stock > 1 ? $data->stock : $data->stock . ' (Produk sudah mau habis)';
                return $stock;
            })
            ->editColumn('description', function ($data) {
                return $data->description;
            })
            ->editColumn('action', function ($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('product.edit', $data->id);
                $url_delete = route('product.delete', $id_encode);
                $action = '<ul class="list-inline">';
                $action .= '<li class="list-inline-item"><a style="color:#22bb33" href="' . $url_edit . '" data-id="' . $data->id . '"><i class="fa-solid fa-pen"></i></a></li>';
                $action .= '<li class="list-inline-item"><div class="delete-button" data-url="' . $url_delete . '" data-id="' . $id_encode . '"><i class="fa-solid fa-trash"></i></div></li>';
                $action .= '</ul>';

                return $action;
            })
            ->rawColumns(['action', 'description'])
            ->make(true);
    }


    public function getAllVarian(Request $request, $id)
    {
        // dd($id);
        $data = ProductType::leftjoin('10_product_variant', '10_product_type.id', '=', '10_product_variant.product_type_id')
            ->orderBy('10_product_type.updated_at', 'DESC')
            ->select('10_product_type.*', '10_product_variant.title as type_name', '10_product_variant.id as id_varian', '10_product_variant.price as price_varian')
            ->where('10_product_type.product_id', '=', $id)
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('price', function ($data) {
                return isset($data->type_name) ?  $data->type_name : "-";
            })
            ->editColumn('price_fix', function ($data) {
                return isset($data->price_varian) ?  $data->price_varian : $data->price;
            })
            ->editColumn('title', function ($data) {
                return $data->title;
            })
            ->editColumn('min_stock', function ($data) {
                return (isset($data->min_stock) or $data->min_stock != '') ? $data->min_stock : 0;
            })
            ->editColumn('stock', function ($data) {
                return (isset($data->stock) or $data->stock != '') ? $data->stock : 0;
            })
            ->editColumn('action', function ($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = isset($data->id_varian) ? route('product.editvarian', $data->id_varian) : route('product.editvarian', $data->id);
                $url_delete = route('product.destroy', $id_encode);
                $action = '<ul class="list-inline">';
                $action .= '<li class="list-inline-item"><div class="edit-button" style="color:#22bb33" data-url="' . $url_edit . '" data-id="' . $data->id_varian . '"><i class="fa-solid fa-pen"></i></div></li>';
                $action .= '<li class="list-inline-item"><div class="delete-button" data-url="' . $url_delete . '" data-id="' . $id_encode . '"><i class="fa-solid fa-trash"></i></div></li>';
                $action .= '</ul>';

                return $action;
            })
            ->rawColumns(['action', 'description'])
            ->make(true);
    }

    public function destroy($id_encode)
    {
        DB::beginTransaction();
        try {
            $id = json_decode(base64_decode($id_encode));
            $id = $id->id;
            $result = ProductType::find($id);

            $product_id = $result->product_id;

            $result->updatedBy = GeneralFunction::myId();
            $result->delete();

            $get_total_stock = ProductType::where('product_id', $product_id)->sum('stock');
            $data_product = array(
                'min_stock' => GeneralFunction::getMinStockProduct($product_id),
                'stock' => $get_total_stock,
                'price' => GeneralFunction::getPriceProduct($product_id),
                'updated_by' => GeneralFunction::myId(),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $result = Product::where('id', $product_id)->update($data_product);

            DB::commit();
            return response()->json(['metaData' => ['code' => 200, 'message' => 'Data Deleted Successfully.'], 'response' => $result], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['metaData' => ['code' => 500, 'message' => $e->getMessage()]], 200);
        }
    }
    public function delete($id_encode)
    {
        DB::beginTransaction();
        try {
            $id = json_decode(base64_decode($id_encode));
            $id = $id->id;
            $result = Product::find($id);
            $result->updatedBy = GeneralFunction::myId();
            $result->delete();

            DB::commit();
            return response()->json(['metaData' => ['code' => 200, 'message' => 'Data Deleted Successfully.'], 'response' => $result], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['metaData' => ['code' => 500, 'message' => $e->getMessage()]], 200);
        }
    }

    public function hasVariant(Request $request)
    {
        DB::beginTransaction();
        try {
            $flag = ($request->hasVariant == "true") ? 1 : 0;
            $result = Product::where('id', $request->product_id)->update(['flag' => $flag]);
            DB::commit();
            return response()->json(['code' => 200, 'message' => '', 'redirectTo' => '', 'data' => $result], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }

    public function addVariant(Request $request)
    {
        DB::beginTransaction();
        try {
            $check = ProductType::find($request->data_type_id);
            $stock = $request->stock_variant;
            $min_stock = $request->min_stock_variant;
            $price = $request->price_variant;

            $check_type = ProductType::where([
                ['product_id', $request->product_id],
                ['title', $request->type]
            ])
                ->first();

            if (isset($check_type) && $request->variant == '') {
                $check_variant = ProductVariant::where([
                    ['product_type_id', $check_type->id],
                ])
                    ->count();

                if ($check_variant > 0) {
                    return response()->json(['code' => 403, 'message' => "Please Check Your Form!", 'error_message' => ['variant' => 'Variant Cannot Be Empty!'], 'redirectTo' => '', 'data' => array()], 200);
                }
            }
            $data_type = array(
                "product_id" => $request->product_id,
                "title" => $request->type,
                'row_status' => '1',
                "min_stock" => $min_stock,
                "stock" => $stock,
                "price" => $price,
                'created_by' => GeneralFunction::myId(),
                'updated_by' => GeneralFunction::myId(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $fix_min_stock_type = $min_stock;
            $fix_stock_type = $stock;
            if ($check) {
                $data_type = array(
                    "product_id" => $request->product_id,
                    "title" => $request->type,
                    'row_status' => '1',
                    "min_stock" => $min_stock,
                    "stock" => $stock,
                    "price" => $price,
                    'updated_by' => GeneralFunction::myId(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $data_variant = array(
                    "product_id" => $request->product_id,
                    "product_type_id" => $request->data_type_id,
                    "title" => $request->variant,
                    "min_stock" => $min_stock,
                    "stock" => $stock,
                    "price" => $price,
                    'row_status' => '1',
                    'created_by' => GeneralFunction::myId(),
                    'updated_by' => GeneralFunction::myId(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $res_product_variant = ProductVariant::where('id', $request->data_variant_id)->update($data_variant);
                $result = ProductType::where('id', $request->data_type_id)->update($data_type);
                $message = 'Successfully Updated Data';
            } else {
                if (isset($check_type)) {
                    $fix_min_stock_type = $check_type->min_stock;
                    $fix_stock_type = $check_type->stock + $stock;
                    $data_type['min_stock'] = $fix_min_stock_type;
                    $data_type['stock'] = $fix_stock_type;
                    $data_type['price'] = $price;
                    $result = ProductType::where('id', $check_type->id)->update($data_type);
                    $product_type_id = $check_type->id;
                } else {
                    $data_type['min_stock'] = $fix_min_stock_type;
                    $data_type['stock'] = $fix_stock_type;
                    $data_type['price'] = $price;
                    $res_product_type = ProductType::create($data_type);
                    $product_type_id = $res_product_type->id;
                }

                if (isset($request->variant)) {
                    $data_variant = array(
                        "product_id" => $request->product_id,
                        "product_type_id" => $product_type_id,
                        "title" => $request->variant,
                        "min_stock" => $min_stock,
                        "stock" => $stock,
                        "price" => $price,
                        'row_status' => '1',
                        'created_by' => GeneralFunction::myId(),
                        'updated_by' => GeneralFunction::myId(),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $res_product_variant = ProductVariant::create($data_variant);
                }
                $message = 'Successfully Add Variant';
            }

            $product_id = $request->product_id;
            $get_total_stock = ProductType::where('product_id', $product_id)->sum('stock');
            $data_product = array(
                'min_stock' => $request->min_stock,
                'stock' => $get_total_stock,
                'price' => GeneralFunction::getPriceProduct($product_id),
                'updated_by' => GeneralFunction::myId(),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $result = Product::where('id', $product_id)->update($data_product);

            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => 'modalAdd', 'data' => array()], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
}
