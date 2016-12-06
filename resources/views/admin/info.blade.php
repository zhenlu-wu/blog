@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="#">系统基本信息</a> &raquo;
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>快捷操作</h3>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="#"><i class="fa fa-plus"></i>新增文章</a>
            <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
            <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->


<div class="result_wrap">
    <div class="result_title">
        <h3>系统基本信息</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>操作系统</label><span><?php echo PHP_OS; ?></span>
            </li>
            <li>
                <label>运行环境</label><span><?php echo $_SERVER['SERVER_SOFTWARE']; ?></span>
            </li>
            <li>
                <label>PHP运行方式</label><span><?php echo $_SERVER['GATEWAY_INTERFACE']?></span>
            </li>
            <li>
                <label>领沃设计-版本</label><span>V1.0</span>
            </li>
            <li>
                <label>上传附件限制</label><span><?PHP echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></span>
            </li>
            <li>
                <label>北京时间</label><span><?php echo date("Y-m-d G:i:s"); ?></span>
            </li>
            <li>
                <label>服务器域名/IP</label><span><?php echo $_SERVER['SERVER_NAME']; ?></span>
            </li>
            <li>
                <label>Host</label><span><?php echo $_SERVER['SERVER_ADDR']; ?></span>
            </li>
        </ul>
    </div>
</div>


<div class="result_wrap">
    <div class="result_title">
        <h3>使用帮助</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>官方交流网站：</label><span><a href="#">http://www.lnwo.com</a></span>
            </li>
            <li>
                <label>官方交流QQ群：</label><span><a href="#"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png"></a></span>
            </li>
        </ul>
    </div>
</div>
<!--结果集列表组件 结束-->
        @endsection
