@extends('admin.parent')
@section('title')
    回馈列表
@endsection
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        if( "{{ session('msg') }}" ){
            alert("{{ session('msg') }}");
        }
    </script>
<div class="contentwrapper">
    <div class="dataTables_wrapper" id="dyntable_wrapper">

            <form style="float: left;margin-left: 30px" action="{{ url('admin/idea') }}">
                <input type="hidden" name="condition" value="all">
                <button type="submit" class="stdbtn btn_blue">显示所有（默认）</button>
            </form>
            <form style="float: left;margin-left: 30px" action="{{ url('admin/idea') }}">
                <input type="hidden" name="condition" value="time">
                <button type="submit" class="stdbtn btn_blue">时间 最新排序</button>
            </form>
            <form style="float: left;margin-left: 30px" action="{{ url('admin/idea') }}">
                <input type="hidden" name="condition" value="zan">
                <button type="submit" class="stdbtn btn_blue">赞同 最多排序</button>
            </form>
            <form style="float: left;margin-left: 30px" action="{{ url('admin/idea') }}">
                <input type="hidden" name="condition" value="new">
                <button type="submit" class="stdbtn btn_blue">所有 未回复  的提交</button>
            </form>

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
            <thead>
                <tr>
                    <th class="head0" rowspan="1" colspan="1" style="width: 210px;">ID</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 308px;">提交人</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 308px;">内容</th>
                    <th class="head0" rowspan="1" colspan="1" style="width: 282px;">提交时间</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 181px;">赞同次数(倒序排列，置顶优先解决)</th>
                    <th class="head0" rowspan="1" colspan="1" style="width: 136px;">回复他</th>
                </tr>
            </thead>
            <tbody>
            @foreach($idea as $v)
                <tr class="gradeA odd">
                    <td class=" sorting_1">{{ $v->idea_id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->idea }}</td>
                    <td>{{ date('Y-m-d H:i:s',$v->time) }}</td>
                    <td class="center">{{ $v->zan }}</td>
                    <td class="center">
                        <button class="stdbtn btn_blue"><a href="{{ url('admin/idea').'/'.$v->idea_id.'/edit' }}">回复他</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection