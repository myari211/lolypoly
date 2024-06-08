@extends('layouts.admin.app', ['title' => 'Setting','parent' => ''])

@section('title', 'Setting')

@section('content')
    <section class="content" id="page-user">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card">
              <div class="card-header p-2">
              	<div class="row">
              		<div class="col-md-10">
              			<ul class="nav nav-pills">
		                  <li class="nav-item tab-form" data-form="form-general"><a class="nav-link active" href="#general"  data-toggle="tab">General</a></li>
		                  <!-- <li class="nav-item tab-form" data-form="form-home"><a class="nav-link" href="#homeheader"  data-toggle="tab">Home Header</a></li> -->
		                  <!-- <li class="nav-item tab-form" data-form="form-aboutus"><a class="nav-link" href="#homeaboutus"  data-toggle="tab">Home About Us</a></li> -->
		                </ul>
              		</div>
              		<div class="col-md-2">
			              <input type="button" class="btn btn-primary btn-block" id="btn-submit-form" data-form="form-general" value="Submit">
              		</div>
              	</div>
              </div><!-- /.card-header -->
              <div class="card-body cardbox-content">
                <div class="tab-content">

                	<div class="active tab-pane" id="general">
			            	<form id="form-general" action="{{ route('setting.storeGeneral') }}">
                			{{ csrf_field() }}
	                  	<div class="row">
		                  		<div class="col-md-4">
	                  				@foreach($data_general as $general)
			                  			@if($general->type == "I")
									              <label>{{$general->display_name}}</label>
									              	<div id="upload-photo">
														<div class="box">
															<div class="js--image-preview js--no-default" style="background-image: url('{{url('/'.$general->value)}}') "></div>
															<div class="upload-options">
															<label>
																<input type="file" name="{{$general->name}}" class="image-upload" accept="image/*" />
															</label>
															</div>
														</div>
													</div>
								              @endif
							            	@endforeach
		                  		</div>
		                  		<div class="col-md-8">
	                  				@foreach($data_general as $general)
			                  			@if($general->type == "T")
									              <div class="form-group">
									                <label>{{$general->display_name}}</label>
									                <textarea name="{{$general->name}}" class="form-control">{{$general->value}}</textarea>
									              </div>
						            			@elseif($general->type == "E")
									              <div class="form-group">
									                <label>{{$general->display_name}}</label>
						                			<textarea class="summernote" placeholder="Place some text here" name="{{$general->name}}" style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$general->value}}</textarea>
									              </div>
						            			@elseif($general->type == "C")
							            			<div class="form-group">
									                <label>{{$general->display_name}}</label>
									                <input type="text" class="form-control" name="{{$general->name}}" value="{{$general->value}}">
									              </div>
						            			@endif
							            	@endforeach
		                  		</div>
			            		</div>
			            	</form>
                  </div>

                  <div class="tab-pane" id="homeheader">
			            	<form id="form-home" action="{{ route('setting.storeHome') }}">
                			{{ csrf_field() }}
	                  	<div class="row">
		                  		<div class="col-md-4">
	                  				@foreach($data_home as $home)
			                  			@if($home->type == "I")
									              <label>{{$home->display_name}}</label>
									              <div id="upload-photo">
								                  <div class="box">
								                    <div class="js--image-preview js--no-default" style="background-image: url('{{url('/'.$home->value)}}') "></div>
								                    <div class="upload-options">
								                      <label>
								                        <input type="file" name="{{$home->name}}" class="image-upload" accept="image/*" />
								                      </label>
								                    </div>
								                  </div>
								                </div>
								              @endif
							            	@endforeach
		                  		</div>
		                  		<div class="col-md-8">
	                  				@foreach($data_home as $home)
			                  			@if($home->type == "T")
									              <div class="form-group">
									                <label>{{$home->display_name}}</label>
									                <textarea name="{{$home->name}}" class="form-control">{{$home->value}}</textarea>
									              </div>
						            			@elseif($home->type == "E")
									              <div class="form-group">
									                <label>{{$home->display_name}}</label>
						                			<textarea class="summernote" placeholder="Place some text here" name="{{$home->name}}" style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$home->value}}</textarea>
									              </div>
						            			@elseif($home->type == "C")
							            			<div class="form-group">
									                <label>{{$home->display_name}}</label>
									                <input type="text" class="form-control" name="{{$home->name}}" value="{{$home->value}}">
									              </div>
						            			@endif
							            	@endforeach
		                  		</div>
			            		</div>
			            	</form>
                  </div>

                  <div class="tab-pane" id="homeaboutus">
			            	<form id="form-aboutus" action="{{ route('setting.storeAboutus') }}">
                			{{ csrf_field() }}
	                  	<div class="row">
		                  		<div class="col-md-4">
	                  				@foreach($data_aboutus as $aboutus)
			                  			@if($aboutus->type == "I")
									              <label>{{$aboutus->display_name}}</label>
									              <div id="upload-photo">
								                  <div class="box">
								                    <div class="js--image-preview js--no-default" style="background-image: url('{{url('/'.$aboutus->value)}}') "></div>
								                    <div class="upload-options">
								                      <label>
								                        <input type="file" name="{{$aboutus->name}}" class="image-upload" accept="image/*" />
								                      </label>
								                    </div>
								                  </div>
								                </div>
								              @endif
							            	@endforeach
		                  		</div>
		                  		<div class="col-md-8">
	                  				@foreach($data_aboutus as $aboutus)
			                  			@if($aboutus->type == "T")
									              <div class="form-group">
									                <label>{{$aboutus->display_name}}</label>
									                <textarea name="{{$aboutus->name}}" class="form-control">{{$aboutus->value}}</textarea>
									              </div>
						            			@elseif($aboutus->type == "E")
									              <div class="form-group">
									                <label>{{$aboutus->display_name}}</label>
						                			<textarea class="summernote" placeholder="Place some text here" name="{{$aboutus->name}}" style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$aboutus->value}}</textarea>
									              </div>
						            			@elseif($aboutus->type == "C")
							            			<div class="form-group">
									                <label>{{$aboutus->display_name}}</label>
									                <input type="text" class="form-control" name="{{$aboutus->name}}" value="{{$aboutus->value}}">
									              </div>
						            			@endif
							            	@endforeach
		                  		</div>
			            		</div>
			            	</form>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
    		</div>
    	</div>
    </section>

@endsection

