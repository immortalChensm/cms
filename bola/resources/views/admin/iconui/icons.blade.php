<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentelella Alela! | </title>

  <!-- Bootstrap -->
  <link href="{{URL::asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{URL::asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{URL::asset('vendors/nprogress/nprogress.css" rel="stylesheet')}}">
  <!-- iCheck -->
  <link href="{{URL::asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  <!-- Switchery -->
  <link href="{{URL::asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">

  <!-- bootstrap-datetimepicker -->
  <link href="{{URL::asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">

  <!-- bootstrap-daterangepicker -->
  <script src="{{URL::asset('vendors/moment/min/moment.min.js')}}"></script>
  <!-- bootstrap-datetimepicker -->
  <script src="{{URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

  <!-- Custom Theme Style -->
  <link href="{{URL::asset('build/css/custom.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{URL::asset('build/css/ait.css')}}">
</head>
<body>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>按钮 <small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <button type="button" class="btn btn-default">默认</button>

      <button type="button" class="btn btn-primary">主要</button>

      <button type="button" class="btn btn-success">成功</button>

      <button type="button" class="btn btn-info">信息</button>

      <button type="button" class="btn btn-warning">警告</button>

      <button type="button" class="btn btn-danger">风险</button>

      <button type="button" class="btn btn-dark">黑色</button>

      <button type="button" class="btn btn-link">链接</button>
      <button type="button" class="btn btn-default btn-sm">默认</button>

      <button type="button" class="btn btn-primary btn-sm">主要</button>

      <button type="button" class="btn btn-success btn-sm">成功</button>

      <button type="button" class="btn btn-info btn-sm">信息</button>

      <button type="button" class="btn btn-warning btn-sm">警告</button>

      <button type="button" class="btn btn-danger btn-sm">风险</button>

      <button type="button" class="btn btn-dark btn-sm">黑色</button>

      <button type="button" class="btn btn-link btn-sm">链接</button>
      <button type="button" class="btn btn-default btn-xs">默认</button>

      <button type="button" class="btn btn-primary btn-xs">主要</button>

      <button type="button" class="btn btn-success btn-xs">成功</button>

      <button type="button" class="btn btn-info btn-xs">信息</button>

      <button type="button" class="btn btn-warning btn-xs">警告</button>

      <button type="button" class="btn btn-danger btn-xs">风险</button>

      <button type="button" class="btn btn-dark btn-xs">黑色</button>

      <button type="button" class="btn btn-link btn-xs">链接</button>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>单选框/复选框 <small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12">
          <div class="checkbox">
            <label>
              <input type="checkbox" class="flat" checked="checked"> Checked
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="flat"> Unchecked
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="flat" disabled="disabled"> Disabled
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" class="flat" disabled="disabled" checked="checked"> Disabled & checked
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" class="flat" checked name="iCheck"> Checked
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" class="flat" name="iCheck"> Unchecked
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" class="flat" name="iCheck" disabled="disabled"> Disabled
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" class="flat" name="iCheck3" disabled="disabled" checked> Disabled & Checked
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Form表单 <small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">姓名 <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">电话 <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">邮箱</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
          </div>
        </div>
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">选择</label>
          <div class="col-xs-3">
            <select class="form-control" required="">
              <option value="">Choose..</option>
              <option value="press">Press</option>
              <option value="net">Internet</option>
              <option value="mouth">Word of mouth</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">性别</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div id="gender" class="btn-group" data-toggle="buttons">
              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
              </label>
              <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input type="radio" name="gender" value="female"> Female
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">切换</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="ait-switch">
              <label>
                <input type="checkbox" class="js-switch" checked />
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">生日 <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class='input-group date' id='myDatepicker'>
              <input type='text' class="form-control" />
              <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                  </span>
            </div>
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="button">Cancel</button>
            <button class="btn btn-primary" type="reset">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>搜索 <small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="clearfix">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="搜索...">
            <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
          </div>
        </div>
      </div>
      <div class="ait-search"><label>Search:<input type="search" placeholder="搜索" class="form-control input-sm" placeholder=""></label></div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>分页 <small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <nav aria-label="...">
        <ul class="pagination">
          <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
      </nav>
      <nav aria-label="Page navigation">
        <ul class="pagination">
          <li>
            <a href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="datatable-keytable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="datatable-keytable_paginate">
            <ul class="pagination">
              <li class="paginate_button previous disabled" id="datatable-keytable_previous">
                <a href="#" aria-controls="datatable-keytable" data-dt-idx="0" tabindex="0">Previous</a></li>
              <li class="paginate_button active"><a href="#" aria-controls="datatable-keytable" data-dt-idx="1" tabindex="0">1</a></li>
              <li class="paginate_button "><a href="#" aria-controls="datatable-keytable" data-dt-idx="2" tabindex="0">2</a></li>
              <li class="paginate_button "><a href="#" aria-controls="datatable-keytable" data-dt-idx="3" tabindex="0">3</a></li>
              <li class="paginate_button "><a href="#" aria-controls="datatable-keytable" data-dt-idx="4" tabindex="0">4</a></li>
              <li class="paginate_button "><a href="#" aria-controls="datatable-keytable" data-dt-idx="5" tabindex="0">5</a></li>
              <li class="paginate_button "><a href="#" aria-controls="datatable-keytable" data-dt-idx="6" tabindex="0">6</a></li>
              <li class="paginate_button next" id="datatable-keytable_next"><a href="#" aria-controls="datatable-keytable" data-dt-idx="7" tabindex="0">Next</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>下拉 <small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="btn-group">
        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Default <span class="caret"></span>
        </button>
        <ul role="menu" class="dropdown-menu">
          <li><a href="#">Action</a>
          </li>
          <li><a href="#">Another action</a>
          </li>
          <li><a href="#">Something else here</a>
          </li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>切换按钮 <small></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Switch</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <div class="">
            <label>
              <input type="checkbox" class="js-switch" checked /> Checked
            </label>
          </div>
          <div class="">
            <label>
              <input type="checkbox" class="js-switch" /> Unchecked
            </label>
          </div>
          <div class="">
            <label>
              <input type="checkbox" class="js-switch" disabled="disabled" /> Disabled
            </label>
          </div>
          <div class="">
            <label>
              <input type="checkbox" class="js-switch" disabled="disabled" checked="checked" /> Disabled Checked
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>展示列表 <small>展示产品</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="table-responsive">
        <table class="table table-striped ait-table bulk_action">
          <thead>
          <tr class="headings">
            <th class="column-title" width="10%">#</th>
            <th class="column-title" width="20%">区域 </th>
            <th class="column-title" width="10%">城市 </th>
            <th class="column-title" width="20%">联系电话 </th>
            <th class="column-title" width="20%">状态 </th>
            <th class="column-title" width="20%">操作 </th>
          </tr>
          </thead>

          <tbody>
          <tr class="even pointer">
            <td class=" ">1</th>
            <td class=" ">工业园区</td>
            <td class=" ">苏州</td>
            <td class=" ">0512-88888888</td>
            <td class=" ">
              <div class="">
                <label>
                  <input type="checkbox" class="js-switch" checked />
                </label>
              </div>
            </td>
            <td class=" ">
              <button type="button" class="btn btn-success btn-sm">编辑</button>
              <button type="button" class="btn btn-danger btn-sm">移除</button>
            </td>
          </tr>
          <tr class="even pointer">
            <td class=" ">1</th>
            <td class=" ">工业园区</td>
            <td class=" ">苏州</td>
            <td class=" ">0512-88888888</td>
            <td class=" ">
              <div class="">
                <label>
                  <input type="checkbox" class="js-switch" checked />
                </label>
              </div>
            </td>
            <td class=" ">
              <button type="button" class="btn btn-success btn-sm">编辑</button>
              <button type="button" class="btn btn-danger btn-sm">移除</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>表格 <small>表格列表</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->

      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
          <tr class="headings">
            <th>
              <input type="checkbox" id="check-all" class="flat">
            </th>
            <th class="column-title">订单号 </th>
            <th class="column-title">日期 </th>
            <th class="column-title">排序 </th>
            <th class="column-title">负责人 </th>
            <th class="column-title">状态 </th>
            <th class="column-title">价格 </th>
            <th class="column-title no-link last"><span class="nobr">操作</span>
            </th>
            <th class="bulk-actions" colspan="7">
              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
          </tr>
          </thead>

          <tbody>
          <tr class="even pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000040</td>
            <td class=" ">May 23, 2014 11:47:56 PM </td>
            <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$7.45</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="odd pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000039</td>
            <td class=" ">May 23, 2014 11:30:12 PM</td>
            <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
            </td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$741.20</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="even pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000038</td>
            <td class=" ">May 24, 2014 10:55:33 PM</td>
            <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
            </td>
            <td class=" ">Mike Smith</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$432.26</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="odd pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000037</td>
            <td class=" ">May 24, 2014 10:52:44 PM</td>
            <td class=" ">121000204</td>
            <td class=" ">Mike Smith</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$333.21</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="even pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000040</td>
            <td class=" ">May 24, 2014 11:47:56 PM </td>
            <td class=" ">121000210</td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$7.45</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="odd pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000039</td>
            <td class=" ">May 26, 2014 11:30:12 PM</td>
            <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
            </td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$741.20</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="even pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000038</td>
            <td class=" ">May 26, 2014 10:55:33 PM</td>
            <td class=" ">121000203</td>
            <td class=" ">Mike Smith</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$432.26</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="odd pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000037</td>
            <td class=" ">May 26, 2014 10:52:44 PM</td>
            <td class=" ">121000204</td>
            <td class=" ">Mike Smith</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$333.21</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>

          <tr class="even pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000040</td>
            <td class=" ">May 27, 2014 11:47:56 PM </td>
            <td class=" ">121000210</td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$7.45</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          <tr class="odd pointer">
            <td class="a-center ">
              <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">121000039</td>
            <td class=" ">May 28, 2014 11:30:12 PM</td>
            <td class=" ">121000208</td>
            <td class=" ">John Blank L</td>
            <td class=" ">Paid</td>
            <td class="a-right a-right ">$741.20</td>
            <td class=" last"><a href="#">View</a>
            </td>
          </tr>
          </tbody>
        </table>
      </div>


    </div>
  </div>
</div>
</div>
<!-- /page content -->

<!-- jQuery -->
<script src="{{URL::asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{URL::asset('vendors/moment/min/moment.min.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>
    $('#myDatepicker').datetimepicker();

</script>
<!-- Bootstrap -->
<script src="{{URL::asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{URL::asset('vendors/nprogress/nprogress.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::asset('vendors/iCheck/icheck.min.js')}}"></script>

<script src="{{URL::asset('vendors/switchery/dist/switchery.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{URL::asset('build/js/custom.min.js')}}"></script>
</body>
</html>