@extends('admin.parent')

@section('content')
<!--     <div class="dataTables_wrapper" id="dyntable_wrapper">
    <div id="dyntable_length" class="dataTables_length" ><label>Show <select size="1" name="dyntable_length"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div> -->
    <form action="" style="line-height: 30px;">
        <p>&nbsp;&nbsp;
            <label class="btn btn3 btn_search">姓名：</label>
            <span class="field"><input type="text" name="admin_name" id="" class="longinput" style="margin-top: 10px;margin-bottom: 10px;width:200px;"></span>
            <button class="submit radius2">搜索</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>
    <form action="" method='post' name='myform' style='display:none'>
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
     </form>
    <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
            <colgroup>
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">
                <col class="con0">
            </colgroup>
            @if (session('msg'))
                <div >
                    {{ session('msg') }}
                </div>
           @endif
           @if (session('error'))
                <div>
                    {{ session('error') }}
                </div>
            @endif
            <thead>
            <tr><th class="head0" rowspan="1" colspan="1">用户名</th><th class="head1" rowspan="1" colspan="1">密码</th><th class="head0" rowspan="1" colspan="1">上次登录时间</th><th class="head1" rowspan="1" colspan="1">上次登陆IP</th><th class="head0" rowspan="1" colspan="1">操作</th></tr>
            </thead>
            <tfoot>
            <tr><th class="head0" rowspan="1" colspan="1">用户名</th><th class="head1" rowspan="1" colspan="1">密码</th><th class="head0" rowspan="1" colspan="1">上次登录时间</th><th class="head1" rowspan="1" colspan="1">上次登陆IP</th><th class="head0" rowspan="1" colspan="1">操作</th></tr>
            </tfoot>

            <tbody>
            @foreach ($list as $v)
            <tr class="gradeA odd">
                <td class=" sorting_1">{{ $v->admin_name }}</td>
                <td>{{ $v->admin_password }}</td>
                <td>{{ $v->last_date }}</td>
                <td class="center">{{ $v->last_ip }}</td>
                <td class="center">
                <a href="javascript:doDel({{$v->admin_id}})">删除</a>|
                <a href="{{ url('admin/ad').'/'.$v->admin_id.'/edit' }}">修改</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="dataTables_info" id="dyntable_info"></div>
        <div class="dataTables_paginate paging_full_numbers" id="dyntable_paginate">
        {!! $list->appends($where)->render() !!}
        </div>


    <script>

    function doDel(admin_id)
    {
        if(confirm('确定要删除吗？')){
            var form = document.myform;
            form.action = '/admin/ad'+'/'+admin_id;
            form.submit();
        }
    }
    </script>
@endsection