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
use App\Models\Brand;
use DateTime;

class PorductCustomController extends Controller
{

    public function index()
    {
        $this->data['data_config'] = '';
        // $this->data['data_brand'] = Brand::orderBy('title','ASC')->whereNull('parent_id')->get();
        $this->data['data_category'] = Brand::where('row_status', '1')->orderBy('title', 'ASC')->get();

        return view('admin.product.custom.index', $this->data);
    }

    public function create()
    {
        $this->data['data_config'] = '';
        // $this->data['data_category'] = Category::where('row_status', '1')->orderBy('title', 'ASC')->get();
        $this->data['data_category'] = Brand::where('row_status', '1')->orderBy('title', 'ASC')->get();

        return view('admin.product.custom.add', $this->data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $path = 'uploads/product';
            $images_thumbnail = $request->images_thumbnail;
            $images_thumbnail_name = null;
            if (isset($images_thumbnail)) {
                $images_thumbnail_name = GeneralFunction::uploadImage($path, $images_thumbnail);
            }
            $slug = GeneralFunction::slug($request->title);
            $check = Product::where('slug', $slug)->count();
            $slug_fix = $check > 0 ? $slug . ' - ' . $check + 1 : $slug;
            $data = array(
                "title" => $request->title,
                "brand_id" => $request->brand_id,
                "weight" => $request->weight,
                "price" => $request->price,
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
            $redirectTo = url('admin/product/custom/edit') . '/' . $product_id;
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

        return view('admin.product.custom.edit', $this->data);
    }
    public function editvarian($id)
    {
        try {
            $data_type = ProductType::with('productImage')
                ->where('id', $id)
                ->first();
                
            $res = array(
                'id' => $data_type->id,
                'data_type_id' => $data_type->id,
                'type' => $data_type->title,
                'price_variant' => $data_type->price,
                'image' => $data_type->image,
                'image_url' => $data_type->image_url,
                'productImage' => $data_type->productImage,
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

            $slug = GeneralFunction::slug($request->title);
            $check = Product::where('slug', $slug)->count();
            $slug_fix = $check > 0 ? $slug . ' - ' . $check + 1 : $slug;
            $data = array(
                "title" => $request->title,
                "slug" => $slug_fix,
                "description" => $request->description,
                "image" => $images_thumbnail_name,
                'row_status' => '1',
                'price' => $request->price,
                'updated_by' => GeneralFunction::myId(),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $result = Product::where('id', $id_encode)->update($data);

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

            $redirectTo = route('product.custom.index');
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
        $data = Product::with('productCategory', 'productImage', 'brand')
            ->where('row_status', '=', '1')
            ->whereNotNull('brand_id')
            ->orderBy('updated_at', "DESC")
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('brand_name', function ($data) {
                return $data->brand->title;
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
                $url_edit = route('product.custom.edit', $data->id);
                $url_delete = route('product.custom.delete', $id_encode);
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
        $data = ProductType::with('productImage')
            ->where('10_product_type.product_id', '=', $id)
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('thumb_image', function ($data) {
                return '<img src="'.$data->image_url.'" style="width: 100%;" alt="Italian Trulli">';
            })
            ->editColumn('price', function ($data) {
                return isset($data->price) ?  $data->price : "0";
            })
            ->editColumn('title', function ($data) {
                return $data->title;
            })
            ->editColumn('action', function ($data) {
                $id = (object)array(
                    'id' => $data->id
                );
                $id_encode = base64_encode(json_encode($id));
                $url_edit = route('product.custom.editvarian', $data->id);
                $url_delete = route('product.custom.destroy', $id_encode);
                $action = '<ul class="list-inline">';
                $action .= '<li class="list-inline-item"><div class="edit-color-button" style="color:#22bb33" data-url="' . $url_edit . '" data-id="' . $data->id . '"><i class="fa-solid fa-pen"></i></div></li>';
                $action .= '<li class="list-inline-item"><div class="delete-button" data-url="' . $url_delete . '" data-id="' . $id_encode . '"><i class="fa-solid fa-trash"></i></div></li>';
                $action .= '</ul>';

                return $action;
            })
            ->rawColumns(['action', 'description', 'thumb_image'])
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
            $price = $request->price_variant;
            
            $path = 'uploads/product';

            $data_product = Product::find($request->product_id);
            $price = $data_product->price;

            $data_type = array(
                "product_id" => $request->product_id,
                "title" => $request->type,
                'row_status' => '1',
                "price" => $price,
                'updated_by' => GeneralFunction::myId(),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $images_thumbnail = $request->images_thumbnail;
            if (isset($images_thumbnail)) {
                $data_type['image'] = GeneralFunction::uploadImage($path, $images_thumbnail);
            }
            if(isset($check)){
                $result = ProductType::where('id',$request->data_type_id)->update($data_type);
                $product_id = $request->data_type_id;
            } else {
                $data_type['created_by'] = GeneralFunction::myId();
                $data_type['created_at'] = date('Y-m-d H:i:s');
                $result = ProductType::create($data_type);
                $product_id = $result->id;
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
            $message = 'Successfully Add Case Color';

            DB::commit();
            return response()->json(['code' => 200, 'message' => $message, 'redirectTo' => 'modalAdd', 'data' => array()], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'message' => 'Wops, something when wrong.', 'error_message' => $e->getMessage()], 200);
        }
    }
}
