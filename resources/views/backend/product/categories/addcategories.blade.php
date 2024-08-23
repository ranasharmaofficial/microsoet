
@extends('backend.layouts.app')

@section('content')
<style>
#hidden_div {
    display: none;
}
#service_div {
    display: none;
}
 
.droplist{
	position:absolute;
	width:215px;
	padding:0px;
	margin:0px;
	list-style:none;
	border:1px solid #dddddd;
	background:#fff;
	display:none;
    z-index: 999;
	top:75px;
	border-radius:5px;
}
.droplist li{
	float:left;
	width:25px;
	height:25px;
	border:1px solid #cccccc;
	line-height:25px;
	text-align:center;
	padding:0px;
	margin:5px;
	list-style:none;
	cursor:pointer;
	position:relative;
}
.droplist li:hover{
	color:#ffffff;
	background:#000000;
}
.droplist label {
    position: absolute;
    margin-bottom: 0;
	width:25px;
	height:25px;
	left:0px;
	cursor:pointer;
}
.droplist input {
    margin: 3px 7px 0px 0px;
    border: 1px solid;
    position: relative;
    opacity: 0;
}

.clist{
	width:200px;
	padding:0px;
	margin:5px 0 0 0px;
	list-style:none;
}
.clist li{
	float:left;
	width:100px;
	height:40px;
	border:1px solid #cccccc;
	line-height:40px;
	text-align:center;
	padding:0px;
	margin:0px;
	list-style:none;
	cursor:pointer;
	position:relative;
	border-bottom:0px!Important;
	border-radius:5px 5px 0 0px;
}
.clist li:hover{
	color:#ffffff;
	background:#000000;
}
.list_active{
	color:#ffffff;
	background:#000000;
	border-radius:5px 5px 0 0px;
}
.clist label {
    position: absolute;
    margin-bottom: 0;
	width:100px;
	height:40px;
	left:0px;
	cursor:pointer;
}
.clist input {
    margin: 3px 7px 0px 0px;
    border: 1px solid;
    position: relative;
    opacity: 0;
}
.maincatbox{
	text-align:center;
	padding:67px 0px;
}
.marginminusright{
	margin-right:-10px;
}
.corder{
	width:100%; 
	padding:10px 0px;
}
.submitbtnadd{
	text-align:center;
	padding:30px 0px;
}
.brdrtop{
	border-top:1px solid #cccccc;
}
.dblock{
	font-size:14px; display:block;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){        
     $("#order_level").on('click', function () {        
        $(".droplist").toggle();
    });
    $(".droplist li").on('click', function () {
        $(".droplist").hide();
    });
    
    //  $("input[type='radio']").click(function(){
    //             var radioValue = $("input[name='rtype']:checked").val();
    //             document.getElementById("order_no").value = radioValue;
    //             alert(radioValue)
    //         });

        
            
   
    $("input[type='radio']").click(function(){
        
            var radioValue = $("input[name='rtype']:checked").val();
            
			document.getElementById("order_level").value = radioValue;
            
        });
    });
    </script>
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Select Product/Sevices Category')}}</h5>
            </div>
            <div class="card-body add-new-style">
                <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Select Business Category Type')}}</label>
                        <div class="col-md-9 brdrbottom" style="padding:0 0px;">
                        <div class="col-md-9 width70 fl">
                        <ul class="clist"><li><input name="ctype" value="products" type="radio" id="products" ><label for="products">Products</label></li><li><input name="ctype" value="products" type="radio" id="Category" ><label for="Category">Services</label></li>
                        </ul></div>
                        
                        <div class="col-md-3 width30 fr">
                        <select id="parent_id1" class="select2 form-control aiz-selectpicker" name="parent_id1" style="float:right; width:80px;" >
                                <option value="0">--- Select ---</option>
                                        <option value="Add" selected="selected">Add</option>
                                        <option value="Edit">Edit</option>
                                        <option value="Delete">Delete</option>
                                </select>
                        </div>
                        </div>
                        </div>
                        
                        
                        <div class="col-md-9 width70 fl"><label class="col-form-label">Select Category</label></div>
                        <div class="col-md-9 width30 fr"><label class="col-form-label">Display Category Type</label></div>
                        <div class="col-md-9 width70 brdrfull fl">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Select Category')}}</label>
                        <div class="col-md-9">
                             <select class="select2 form-control aiz-selectpicker" name="parent_id" id="parent_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">{{ translate('--- No Selection Then Create Main Category--- ') }}</option>
                                @foreach ($parentcategorylist as $category)
                                    <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Select Subcategory')}}</label>
                        <div class="col-md-9">
                             <select class="form-control" id="subcategory_id" name="parent_id1" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                
                                <option value="0">{{ translate('Create New Subcategory') }}</option>
                            </select>
                        </div>
                    </div>
                    
                    Note: If Select Subcategory Then Create Third Category
                    
                    </div>
                    <div class="col-md-9 width30 brdrfull fr maincatbox marginminusright">                  
					
                    
                    <strong class="dblock">Create</strong><strong class="dblock">Main</strong><strong class="dblock">Category</strong>
                    
                    </div>
                    
                    
                    
                    <div class="form-group fl corder">
                        
                        <div class="col-md-4 fl">
                            <label class="">
                                {{translate('Current Order Position')}}
                            </label>
                            <input type="number" readonly name="order_level" class="form-control" id="current_order_level" placeholder="{{translate('Create Order Level')}}">
                            <small>{{translate('Check your current order position')}}</small>
                        </div>
                        <div class="col-md-4 fl">
                            <label class="">
                                {{translate('Change Order Position')}}
                            </label>
                            <input type="number"  name="order_level" class="form-control" id="order_level" placeholder="{{translate('Create Order Level')}}">
                            <small>{{translate('Higher number has high priority')}}</small>
                            
                            <ul class="droplist">
                                {{-- <li><input name="rtype" value="1" type="radio" id="1" ><label for="1">1</label></li> --}}
                                
                            </ul>

                        </div>
                        
                        <div class="col-md-4 brdrfull width30 fr marginminusright submitbtnadd"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </div>
                    
                    <div class="form-group row brdrtop">
                        <label class="col-md-3 col-form-label">{{translate('Create Category Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{translate('Create Main Category, Subcategory, Third category')}}" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" style="background:#fff; width:200px; z-index:2;">Select Category Filled</label>
                        <div class="col-md-8" style="margin-top:-34px;"><hr></div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Type')}}</label>
                        <div class="col-md-9">
                            <select name="digital" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="0">{{translate('Physical')}}</option>
                                <option value="1">{{translate('Digital')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Page Wise Banner')}} <small>({{ translate('1366x420') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="page_wise_banner" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Home Image')}} <small>({{ translate('800x460') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="home_image" class="selected-files">
								
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Banner')}} <small>({{ translate('200x200') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="banner" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Icon')}} <small>({{ translate('32x32') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="icon" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Short Description')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="short_description" placeholder="{{translate('Short Description')}}">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Meta Title')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meta_title" placeholder="{{translate('Meta Title')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Meta Description')}}</label>
                        <div class="col-md-9">
                            <textarea name="meta_description" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    @if (get_setting('category_wise_commission') == 1)
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Commission Rate')}}</label>
                            <div class="col-md-9 input-group">
                                <input type="number" lang="en" min="0" step="0.01" placeholder="{{translate('Commission Rate')}}" id="commision_rate" name="commision_rate" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Filtering Attributes')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="filtering_attributes[]" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" multiple>
                                @foreach (\App\Models\Attribute::all() as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    function showDiv(select){
    if(select.value==1){
        document.getElementById('hidden_div').style.display = "block";
    } else{
        document.getElementById('hidden_div').style.display = "none";
    }

    if(select.value==2){
    document.getElementById('service_div').style.display = "block";
        } else{
            document.getElementById('service_div').style.display = "none";
        }
    } 

    jQuery(document).ready(function(){
        jQuery('#parent_id').change(function(){
            let parent_id=jQuery(this).val();
            let datas = "";
            jQuery.ajax({
                url:'{{route('getSubCategoriesName')}}',
                type:'post',
                data:'parent_id='+parent_id+'&_token={{csrf_token()}}',
                success:function(result){
                    if (result == '') {
                        datas += '<option value="0">Not Found.</option>';
                    } else{
                        // console.log(result.order_level);
                        // $('#current_order_level').html(result.order_level);
                        datas += '<option value="0">Create New Subcategory</option>';
                        $.each(result, function (i) {
                           
								// if(result.length<1){
								// 	datas += '<option value="0">---Select Subcategory---</option>';
								// }
                            datas += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
                            //  console.log(datas);
                        });                    
                    }
                    
                }
                // subcategory_id
                // $('#subcategory_id').html(datas);
            });
        });

        jQuery('#parent_id').change(function(){
            let parent_id=jQuery(this).val();
            let datas = "";
            jQuery.ajax({
                url:'{{route('getFirstCatOrderLevel')}}',
                type:'post',
                data:'parent_id='+parent_id+'&_token={{csrf_token()}}',
                success:function(result){
                    // console.log(result);
                     $('#current_order_level').val(result.latest_second_order_level);
                        
                        let onos = '';
                
                for (var i = 1; i < result.latest_second_order_level; i++) {
                    onos += '<li><input name="rtype" value="'+i+'" type="radio" id="'+i+'" ><label for="'+i+'">'+i+'</label></li>';
                }

                $(document).ready(function(){
                $("input[type='radio']").click(function(){
                    var radioValue = $("input[name='rtype']:checked").val();
                    
                    document.getElementById("order_level").value = radioValue;
                });
            });

                $('.droplist').html(onos);
 }
            });
        });

        jQuery('#subcategory_id').change(function(){
            let subcategory_id=jQuery(this).val();
            let datas = "";
            jQuery.ajax({
                url:'{{route('getSecondOrderLevel')}}',
                type:'post',
                data:'subcategory_id='+subcategory_id+'&_token={{csrf_token()}}',
                success:function(result){
                     $('#current_order_level').val(result.order_level);
                        //    console.log(result.order_level);                
                    // }
                    // jQuery('#subcategory_id').html(datas);
                }
            });
        });


    });
</script>

@endsection
