@extends('layout.admin-main')

@section('title','个人设置')


@section('body')
    <div class="wrapper wrapper-content  animated fadeInRight article">
    <div class="row m-t-md m-b-lg">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户信息设置</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content col-lg-12">
                    <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">用户名</label>

                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Username"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Help text</label>
                            <div class="col-sm-10"><input type="text" class="form-control"> <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Placeholder</label>

                            <div class="col-sm-10"><input type="text" placeholder="placeholder" class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-lg-2 control-label">Disabled</label>

                            <div class="col-lg-10"><input type="text" disabled="" placeholder="Disabled input here..." class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-lg-2 control-label">Static control</label>

                            <div class="col-lg-10"><p class="form-control-static">email@example.com</p></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Checkboxes and radios <br/>
                                <small class="text-navy">Normal Bootstrap elements</small></label>

                            <div class="col-sm-10">
                                <div><label> <input type="checkbox" value=""> Option one is this and that&mdash;be sure to include why it's great </label></div>
                                <div><label> <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Option one is this and that&mdash;be sure to
                                        include why it's great </label></div>
                                <div><label> <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> Option two can be something else and selecting it will
                                        deselect option one </label></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Checkboxes &amp; radios <br/><small class="text-navy">Custom elements</small></label>

                            <div class="col-sm-10">
                                <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> Option one </label></div>
                                <div class="i-checks"><label> <input type="checkbox" value="" checked=""> <i></i> Option two checked </label></div>
                                <div class="i-checks"><label> <input type="checkbox" value="" disabled="" checked=""> <i></i> Option three checked and disabled </label></div>
                                <div class="i-checks"><label> <input type="checkbox" value="" disabled=""> <i></i> Option four disabled </label></div>
                                <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Option one </label></div>
                                <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Option two checked </label></div>
                                <div class="i-checks"><label> <input type="radio" disabled="" checked="" value="option2"> <i></i> Option three checked and disabled </label></div>
                                <div class="i-checks"><label> <input type="radio" disabled="" name="a"> <i></i> Option four disabled </label></div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Select</label>

                            <div class="col-sm-10"><select class="form-control m-b" name="account">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                </select>


                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit">Cancel</button>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection