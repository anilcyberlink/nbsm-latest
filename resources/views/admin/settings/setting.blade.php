@extends('admin.master')

@section('title', 'Setting')

@section('breadcrumb')
@endsection

@section('content')

    <form class="form-horizontal" role="form" action="{{ url('admin/settings', 1) }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="col-md-9">

            {{-- General Settings --}}
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">General Settings</span>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Site Name</label>
                        <div class="col-lg-8">
                            <input type="text" name="site_name" class="form-control" value="{{ $data->site_name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Location</label>
                        <div class="col-lg-8">
                            <input type="text" name="location1" class="form-control" value="{{ $data->location1 }}">
                            <input type="text" name="address2" class="form-control mb10"
                                value="{{ $data->address2 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Website</label>
                        <div class="col-lg-8">
                            <input type="text" name="website" class="form-control" value="{{ $data->website }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Professionals</label>
                        <div class="col-lg-8">
                            <input type="text" name="field3" class="form-control" value="{{ $data->field3 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Chartered Accountants</label>
                        <div class="col-lg-8">
                            <input type="text" name="location2" class="form-control mb10"
                                value="{{ $data->location2 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Founded Year</label>
                        <div class="col-lg-8">
                            <input type="text" name="year" class="form-control" value="{{ $data->year }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Countries — Moore Global network</label>
                        <div class="col-lg-8">
                            <input type="text" name="network" class="form-control mb10"
                                value="{{ $data->network }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Offices </label>
                        <div class="col-lg-8">
                            <input type="text" name="office" class="form-control mb10"
                                value="{{ $data->office }}">
                        </div>
                    </div>

                </div>
            </div>


            {{-- Contact Information --}}
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Contact Information</span>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email Primary</label>
                        <div class="col-lg-8">
                            <input type="text" name="email_primary" class="form-control"
                                value="{{ $data->email_primary }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email Secondary</label>
                        <div class="col-lg-8">
                            <input type="text" name="email_secondary" class="form-control"
                                value="{{ $data->email_secondary }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone Primary</label>
                        <div class="col-lg-8">
                            <input type="text" name="phone" class="form-control" value="{{ $data->phone }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone Secondary</label>
                        <div class="col-lg-8">
                            <input type="text" name="phone2" class="form-control" value="{{ $data->phone2 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Viber No</label>
                        <div class="col-lg-8">
                            <input type="text" name="address" class="form-control" value="{{ $data->address }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Page Map</label>
                        <div class="col-lg-8">
                            <textarea name="google_map2" class="form-control" rows="4">{{ $data->google_map2 }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Additional Fields --}}
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Branch Office</span>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Location</label>
                        <div class="col-lg-8">
                            <input type="text" name="location_link" class="form-control mb10"
                                value="{{ $data->location_link }}">

                            <input type="text" name="field2" class="form-control" value="{{ $data->field2 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Number</label>
                        <div class="col-lg-8">
                            <input type="text" name="website2" class="form-control mb10"
                                value="{{ $data->website2 }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>
                        <div class="col-lg-8">
                            <input type="text" name="field1" class="form-control" value="{{ $data->field1 }}">
                        </div>
                    </div>

                </div>
            </div>


            {{-- Website Content --}}
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Website Content</span>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Footer Text</label>
                        <div class="col-lg-8">
                            <input type="text" name="welcome_title" class="form-control"
                                value="{{ $data->welcome_title }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Welcome Text</label>
                        <div class="col-lg-8">
                            <textarea name="welcome_text" class="form-control my-editor" rows="5">{{ $data->welcome_text }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Copyright Text</label>
                        <div class="col-lg-8">
                            <textarea name="copyright_text" class="form-control" rows="3">{{ $data->copyright_text }}</textarea>
                        </div>
                    </div>

                </div>
            </div>


            {{-- SEO --}}
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">SEO Settings</span>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Meta Keywords</label>
                        <div class="col-lg-8">
                            <input type="text" name="meta_key" class="form-control" value="{{ $data->meta_key }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Meta Description</label>
                        <div class="col-lg-8">
                            <textarea name="meta_description" class="form-control" rows="4">{{ $data->meta_description }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Save --}}
            <div class="panel">
                <div class="panel-body text-right">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-save"></i> Save Settings
                    </button>
                </div>
            </div>

        </div>


        {{-- Right Sidebar --}}
        <div class="col-md-3">

            <div class="admin-form">

                {{-- Social Links --}}
                <div class="sid_ mb10">

                    <div class="panel-heading">
                        <span class="panel-title">Social Links</span>
                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook_link" class="form-control"
                                value="{{ $data->facebook_link }}">
                        </div>

                        <div class="form-group">
                            <label>LinkedIn</label>
                            <input type="text" name="linkedin_link" class="form-control"
                                value="{{ $data->linkedin_link }}">
                        </div>

                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" name="instagram_link" class="form-control"
                                value="{{ $data->instagram_link }}">
                        </div>

                        <div class="form-group">
                            <label>Google Plus</label>
                            <input type="text" name="google_plus" class="form-control"
                                value="{{ $data->google_plus }}">
                        </div>

                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" name="twitter_link" class="form-control"
                                value="{{ $data->twitter_link }}">
                        </div>

                        <div class="form-group">
                            <label>YouTube</label>
                            <input type="text" name="experience" class="form-control"
                                value="{{ $data->experience }}">
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
