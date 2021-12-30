@extends("layouts.admin.main")

@section('custom_css')
    <link href="/system/vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                        <span><i class="icon-calender"></i></span>
                        <span class="ml-1">Create a new room</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/rooms">Rooms</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form step</h4>
                        </div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    There were some errors with your request.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            @if (session()->has('error_message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error_message') }}
                                </div>
                            @endif

                            <form method="POST" action="" id="step-form-horizontal" class="step-form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <h4>Room Details</h4>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Name *</label>
                                                    <input type="text" name="name" value="{{ old('name') }}"
                                                        class="form-control" placeholder="Room name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Price per night *</label>
                                                    <input type="number" min="0" value="{{ old('price_per_night', 0) }}"
                                                        name="price_per_night" class="form-control"
                                                        placeholder="Price per night" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Price per day *</label>
                                                    <input type="text" min="0" name="price_per_day"
                                                        value="{{ old('price_per_day', 0) }}" class="form-control"
                                                        placeholder="Price per day" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Price per week *</label>
                                                    <input type="number" min="1" name="price_per_week"
                                                        value="{{ old('price_per_week', 0) }}" class="form-control"
                                                        placeholder="Price per week" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Room details *</label>
                                                    <textarea name="details" class="form-control" rows="6"
                                                        required>{!! old('details') !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h4>Availability & Other Info</h4>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Floor number *</label>
                                                    <input type="number" min="1" name="floor_number"
                                                        value="{{ old('floor_number', 0) }}" class="form-control"
                                                        placeholder="Floor number" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Room Type *</label>
                                                    <div class="input-group">
                                                        <select required name="room_types" class="form-control">
                                                            <option value="">Select room type</option>
                                                            <option
                                                                {{ old('room_types') === 'Single Room' ? 'selected' : '' }}>
                                                                Single Room</option>
                                                            <option
                                                                {{ old('room_types') === 'Double Room' ? 'selected' : '' }}>
                                                                Double Room</option>
                                                            <option
                                                                {{ old('room_types') === 'Triple Room' ? 'selected' : '' }}>
                                                                Triple Room</option>
                                                            <option
                                                                {{ old('room_types') === 'Queen Size' ? 'selected' : '' }}>
                                                                Queen Size</option>
                                                            <option
                                                                {{ old('room_types') === 'Kingsize Room' ? 'selected' : '' }}>
                                                                Kingsize Room</option>
                                                            <option
                                                                {{ old('room_types') === 'Studio Room' ? 'selected' : '' }}>
                                                                Studio Room</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Smoking Type *</label>
                                                    <div class="input-group">
                                                        <select required name="smoking_type" class="form-control">
                                                            <option value="">Select smoking type</option>
                                                            <option
                                                                {{ old('smoking_type') === 'Smoking' ? 'selected' : '' }}>
                                                                Smoking</option>
                                                            <option
                                                                {{ old('smoking_type') === 'Non Smoking' ? 'selected' : '' }}>
                                                                Non Smoking</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Bed type</label>
                                                    <input type="text" name="bed_type" value="{{ old('bed_type') }}"
                                                        class="form-control" placeholder="Bed type eg: 1 large double bed"
                                                        required>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">Is room available? *</label>
                                                    <div class="input-group">
                                                        <select required name="is_room_available" class="form-control">
                                                            <option value="1"
                                                                {{ old('is_room_available') === '1' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            <option value="0"
                                                                {{ old('is_room_available') === '0' ? 'selected' : '' }}>
                                                                No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h4>Room images</h4>
                                    <section>
                                        <div class="row">
                                            <div class="col-4 col-sm-3 mb-4">
                                                <h4>Upload images *</h4>
                                            </div>
                                            <div class="col-4 col-sm-3 mb-4">
                                                <div class="form-group">
                                                    <input class="form-control" accept="image/*" multiple type="file"
                                                        name="images[]" required>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h4>Select Amenities</h4>
                                    <section>
                                        <div class="row">
                                            <div class="col-4 col-sm-3 mb-4">
                                                <h4>Add Amenities</h4>
                                            </div>
                                            <div class="col-4 col-sm-3 mb-4">
                                                <div class="form-group">
                                                    @foreach (\App\Amenity::all() as $amenity)
                                                        <div class="form-check">
                                                            <input name="amenities[]" class="form-check-input"
                                                                type="checkbox" value="{{ $amenity->id }}"
                                                                id="amenity-{{ $amenity->id }}">
                                                            <label class="form-check-label"
                                                                for="amenity-{{ $amenity->id }}">
                                                                {{ $amenity->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')

    <script src="/system/vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="/system/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="/system/js/plugins-init/jquery.validate-init.js"></script>
    <!-- Form step init -->
    <script src="/system/js/plugins-init/jquery-steps-init.js"></script>

@endsection
