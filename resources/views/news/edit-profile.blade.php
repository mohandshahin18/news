@extends('news.parent')

@section('title', 'Edit Profile')


@section('style')

@endsection


@section('content')

<div class="container shadow" style="    padding: 3%; margin-top: 2%; margin-bottom: 2%; border-radius: 0.5rem; background: #fff;">
    <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">

                    {{-- <div class="profile-img">
                        @if(Auth::user()->image == null)
                        <img id="output" class="fileName"  src="{{ asset('cms/dist/img/user1.svg') }}" alt="Change Your Photo"/>
                        @else
                        <img id="output" class="fileName" src="{{ asset('storage/images/visitor/'.Auth::user()->image) }}" alt="Change Your Photo"/>

                        @endif
                        <div class="file">
                            <input accept="image/*"  onchange="loadFile(event)" type="file" name="image" id="image" title="Change Your Photo"/>

                            <i class="fas fa-pen">
                            </i>

                        </div>
                    </div> --}}
                    @if(Auth::user()->image == null)
                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_user_avatar_3">
                            <div class="kt-avatar__holder" style="background-image: url({{  asset('cms/dist/img/user.png') }})"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="Change avatar" >
                                <i class="fas fa-pen"></i>
                                <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                            </label>

                        </div>
                    @else
                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_user_avatar_3">
                                <div class="kt-avatar__holder" style="background-image: url({{ asset('storage/images/visitor/'.Auth::user()->image) }})"></div>
                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="Change avatar" >
                                    <i class="fas fa-pen"></i>
                                    <input type="file" name="image" id="image" >
                                </label>

                            </div>
                    @endif


                    <h5 class="user-name">{{ Auth::user()->full_name  }}</h5>
                    <h6 class="user-email">{{ Auth::user()->email }}</h6>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $visitors->firstname }}" placeholder="Enter full name">
                    </div>


                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $visitors->lastname }}" placeholder="Enter full name">
                    </div>


                </div>


                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $visitors->email }}" id="email" placeholder="Enter email ID">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="mobile">Phone</label>
                        <input type="text" class="form-control" value="{{ $visitors->mobile }}" name="mobile" id="mobile" placeholder="Enter phone number">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" >
                                       <option selected data-display="Select">{{ $visitors->gender }} </option>
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                            </select>

                </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="date_of_birth">Date of birth</label>
                        <input type="date" class="form-control" value="{{ $visitors->date_of_birth }}" name="date_of_birth" id="date_of_birth" placeholder="Enter phone number">
                    </div>
                </div>

                {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group ">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" value="{{ $visitors->image }}" name="image" id="image"  placeholder="Enter image">
                  </div>
                </div> --}}


            </div>

            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <a href="{{ route('profile.visitor') }}" class="btn btn-secondary">Cancle</a>

                        <button type="button" onclick="performSUpdate({{ Auth::user()->id }})" id="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
<script defer src="https://cdn.crop.guide/loader/l.js?c=123ABC"></script>

<script>
    function performSUpdate(id){
        let formData = new FormData();
        formData.append('firstname',document.getElementById('firstname').value);
        formData.append('lastname',document.getElementById('lastname').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('gender',document.getElementById('gender').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('date_of_birth',document.getElementById('date_of_birth').value);
        formData.append('image',document.getElementById('image').files[0]);


        storeRoute('/home/update_profile/'+id , formData);
    }

    // imgInp.onchange = evt => {
    //     const [file] = image.files
    //     if (file) {
    //     blah.src = URL.createObjectURL(file)
    // }
// }
</script>


<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };

    $(document).on('change', ".fileUploadWrap input[type='file']",function(){
        if ($(this).val()) {

            var filename = $(this).val().split("\\");

            filename = filename[filename.length-1];

            $('.fileName').text(filename);
        }
 });




  </script>


<script>
    "use strict";

/**
 * @class KApp
 */

var KTApp = function() {
    // /** @type {object} colors State colors **/
    // var colors = {};



}();




// plugin setup
var KTAvatar = function(elementId, options) {
    // Main object
    var the = this;
    var init = false;

    // Get element object
    var element = KTUtil.get(elementId);
    var body = KTUtil.get('body');

    if (!element) {
        return;
    }

    // Default options
    var defaultOptions = {
    };

    ////////////////////////////
    // ** Private Methods  ** //
    ////////////////////////////

    var Plugin = {
        /**
         * Construct
         */

        construct: function(options) {
            if (KTUtil.data(element).has('avatar')) {
                the = KTUtil.data(element).get('avatar');
            } else {
                // reset menu
                Plugin.init(options);

                // build menu
                Plugin.build();

                KTUtil.data(element).set('avatar', the);
            }

            return the;
        },

        /**
         * Init avatar
         */
        init: function(options) {
            the.element = element;
            the.events = [];

            the.input = KTUtil.find(element, 'input[type="file"]');
            the.holder = KTUtil.find(element, '.kt-avatar__holder');
            the.cancel = KTUtil.find(element, '.kt-avatar__cancel');
            the.src = KTUtil.css(the.holder, 'backgroundImage');

            // merge default and user defined options
            the.options = KTUtil.deepExtend({}, defaultOptions, options);
        },

        /**
         * Build Form Wizard
         */
        build: function() {
            // Handle avatar change
            KTUtil.addEvent(the.input, 'change', function(e) {
                e.preventDefault();

	            if (the.input && the.input.files && the.input.files[0]) {
	                var reader = new FileReader();
	                reader.onload = function(e) {
	                    KTUtil.css(the.holder, 'background-image', 'url('+e.target.result +')');
	                }
	                reader.readAsDataURL(the.input.files[0]);

	                KTUtil.addClass(the.element, 'kt-avatar--changed');
	            }
            });


        },


    };




    // Construct plugin
    Plugin.construct.apply(the, [options]);

};





var KTUtil = function() {
    var resizeHandlers = [];





    return {




        // Deep extend:  $.extend(true, {}, objA, objB);
        deepExtend: function(out) {
            out = out || {};

            for (var i = 1; i < arguments.length; i++) {
                var obj = arguments[i];

                if (!obj)
                    continue;

                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        if (typeof obj[key] === 'object')
                            out[key] = KTUtil.deepExtend(out[key], obj[key]);
                        else
                            out[key] = obj[key];
                    }
                }
            }

            return out;
        },


        get: function(query) {
            var el;

            if (query === document) {
                return document;
            }

            if (!!(query && query.nodeType === 1)) {
                return query;
            }

            if (el = document.getElementById(query)) {
                return el;
            } else if (el = document.getElementsByTagName(query), el.length > 0) {
                return el[0];
            } else if (el = document.getElementsByClassName(query), el.length > 0) {
                return el[0];
            } else {
                return null;
            }
        },
        find: function(parent, query) {
            parent = KTUtil.get(parent);
            if (parent) {
                return parent.querySelector(query);
            }
        },


        data: function(element) {

return {



    has: function(name) {




    },


};
},




css: function(el, styleProp, value) {


if (value !== undefined) {
    el.style[styleProp] = value;
} else {
    var defaultView = (el.ownerDocument || document).defaultView;

}
},


addEvent: function(el, type, handler, one) {
            el = KTUtil.get(el);

            if (typeof el !== 'undefined' && el !== null) {
                el.addEventListener(type, handler);
            }
        },




        ready: function(callback) {
            if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
                callback();
            } else {
                document.addEventListener('DOMContentLoaded', callback);
            }
        },


    }
}();



// Class definition
var KTAvatarDemo = function () {
	// Private functions
	var initDemos = function () {
		var avatar1 = new KTAvatar('kt_user_avatar_1');
        var avatar2 = new KTAvatar('kt_user_avatar_2');
        var avatar3 = new KTAvatar('kt_user_avatar_3');
        var avatar4 = new KTAvatar('kt_user_avatar_4');
	}

	return {
		// public functions
		init: function() {
			initDemos();
		}
	};
}();

KTUtil.ready(function() {
	KTAvatarDemo.init();
});



  </script>

@endsection

