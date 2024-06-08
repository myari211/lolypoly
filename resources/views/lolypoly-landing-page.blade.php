@extends('lolypoly.app')

@section('content')
<div class="mb-5">
    <div class="container pb-5">
        <img src="{{ asset($promo->image) }}" alt="" class="img-fluid">
    </div>
	<div id="testimonial" style="background: #F5F5F5; padding:25px 0;">
		<div class="container">
			<div class="wrapper">
				<div class="testimonial-slider">
					@foreach($data_testimonial as $testimonial)
						<div class="testimonial-item" style="background-image: url({{ asset('images/bg-testi.png') }});background-repeat: no-repeat;padding:35px;max-width: 750px;height: 375px;background-size: contain;margin:0 10px">
							<h4>{{ $testimonial->name }}</h4>

							@for ($x = $testimonial->stars; $x >= 1; $x--)
								<i class=" fa fa-star star-{{$x}}" style="color: #FFBF02;"></i>
							@endfor
							<span style="color: #878787; font-size:20px">{{ (new \App\Helpers\GeneralFunction())->time_elapsed_string($testimonial->created_at) }}</span>
							<div class="testimonial-description" style="padding: 15px 0; border-top:solid 1px #E5E5E5; margin-top:15px;">
								<p  style="font-size: 20px;">{{ $testimonial->description }}</p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
    <div class="container" style="padding:25px 0;">
		<div id="landing-productcase"style="background-image: url({{ asset('images/bg-customcase.png') }});">
			<a href="{{ route('lolypoly.dyoc.index') }}">Pick your custom case here</a>
		</div>
		<div id="landing-product" style="padding:25px 0;">
			
			@foreach($data_category as $category)
				@if(count($category->productCategory) > 0 )
				<h2>Our {{ $category->title }}</h2>
				<br>
				<div class="product-slider">
					@foreach($category->productCategory as $prd)
						@if(isset($prd->product))
							<div class="zoom-effect" style="max-width: 350px;">
								<a href="{{ route('lolypoly.product.detail', ['id' => encrypt($prd->product->id)]) }}">
									@if ($prd->product->image != '')
										<img src="{{ asset('' . $prd->product->image . '') }}" alt="Product Image" class="img-fluid w-100 shadow rounded">
									@else
										<img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
											class="img-fluid w-100 shadow rounded">
									@endif
								</a>
								<h5 class="my-3"><a href="{{ route('lolypoly.product.detail', ['id' => encrypt($prd->product->id)]) }}">
									{{ $prd->product->title }}
								</a>
								</h5>
								<h5 class=""><b>Rp 210.000</b></h5>
							</div>
						@endif
					@endforeach
				</div>
				<br>
				@endif
			@endforeach

		</div>
    </div>
</div>
        

    @endsection
