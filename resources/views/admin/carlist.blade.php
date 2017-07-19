@extends('admin.parent')
@section('title')
    轮播图列表
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
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
            <thead>
            <tr>
                <th class="head0">ID</th>
                <th class="head1">NAME</th>
                <th class="head0">MOVIE</th>
                <th class="head1">PHOTO</th>
                <th class="head0">DO</th>
            </tr>
            </thead>
            <tbody>
            @foreach($car as $v)
                <tr>
                    <td>{{ $v->carousel_id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->moviename }}</td>
                    <td class="center">
                        <img width="100px" src="{{ asset('upload/carousel').'/'.$v->photo }}" alt="">
                    </td>
                    <td class="center">
                        <button  class="stdbtn btn_yellow"><a href="{{ url('admin/carousel').'/'.$v->carousel_id.'/edit' }}">修改</a></button>
                        @if($v->display == 1)
                            <button class="stdbtn btn_lime"><a href="{{ url('admin/carousel').'/'.$v->carousel_id.'and'.$v->display }}">禁用</a></button>
                        @else
                            <button class="stdbtn btn_red"><a href="{{ url('admin/carousel').'/'.$v->carousel_id.'and'.$v->display }}">启用</a></button>
                        @endif
                        {{--<button class="stdbtn btn_black"><a href="{{ url('carousel/delete').'/'.$v->carousel_id }}">删除</a></button>--}}
                        <button class="stdbtn btn_black"><a href='javascript:doDel({{ $v->carousel_id }})'>删除</a></button>
                        <form action="" id="deleteform" style="display: none;" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <script>
                            function doDel(id)
                            {
                                if(confirm('你确定要删除吗？')){
                                    var form = document.getElementById('deleteform');
                                    form.action = '{{ url('admin/carousel') }}'+'/'+id;
                                    form.submit();
                                }
                            }
                        </script>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection