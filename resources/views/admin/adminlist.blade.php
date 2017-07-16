@extends('admin.parent')

@section('content')
    <div class="dataTables_wrapper" id="dyntable_wrapper"><div id="dyntable_length" class="dataTables_length"><label>Show <select size="1" name="dyntable_length"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_filter" id="dyntable_filter"><label>Search: <input type="text"></label></div><table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
            <colgroup>
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">
                <col class="con0">
            </colgroup>
            <thead>
            <tr><th class="head0 sorting_asc" rowspan="1" colspan="1" style="width: 202px;">Rendering engine</th><th class="head1 sorting" rowspan="1" colspan="1" style="width: 297px;">Browser</th><th class="head0 sorting" rowspan="1" colspan="1" style="width: 271px;">Platform(s)</th><th class="head1 sorting" rowspan="1" colspan="1" style="width: 174px;">Engine version</th><th class="head0 sorting" rowspan="1" colspan="1" style="width: 130px;">CSS grade</th></tr>
            </thead>
            <tfoot>
            <tr><th class="head0" rowspan="1" colspan="1">Rendering engine</th><th class="head1" rowspan="1" colspan="1">Browser</th><th class="head0" rowspan="1" colspan="1">Platform(s)</th><th class="head1" rowspan="1" colspan="1">Engine version</th><th class="head0" rowspan="1" colspan="1">CSS grade</th></tr>
            </tfoot>

            <tbody><tr class="gradeA odd">
                <td class=" sorting_1">Gecko</td>
                <td>Firefox 1.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.7</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even">
                <td class=" sorting_1">Gecko</td>
                <td>Firefox 1.5</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd">
                <td class=" sorting_1">Gecko</td>
                <td>Firefox 2.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even">
                <td class=" sorting_1">Gecko</td>
                <td>Firefox 3.0</td>
                <td>Win 2k+ / OSX.3+</td>
                <td class="center">1.9</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd">
                <td class=" sorting_1">Gecko</td>
                <td>Camino 1.0</td>
                <td>OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even">
                <td class=" sorting_1">Gecko</td>
                <td>Camino 1.5</td>
                <td>OSX.3+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd">
                <td class=" sorting_1">Gecko</td>
                <td>Netscape 7.2</td>
                <td>Win 95+ / Mac OS 8.6-9.2</td>
                <td class="center">1.7</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even">
                <td class=" sorting_1">Gecko</td>
                <td>Netscape Browser 8</td>
                <td>Win 98SE+</td>
                <td class="center">1.7</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd">
                <td class=" sorting_1">Gecko</td>
                <td>Netscape Navigator 9</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even">
                <td class=" sorting_1">Gecko</td>
                <td>Mozilla 1.0</td>
                <td>Win 95+ / OSX.1+</td>
                <td class="center">1</td>
                <td class="center">A</td>
            </tr>
            </tbody>
        </table>
        <div class="dataTables_info" id="dyntable_info">Showing 1 to 10 of 51 entries</div>
        <div class="dataTables_paginate paging_full_numbers" id="dyntable_paginate">
            <span class="first paginate_button paginate_button_disabled" id="dyntable_first">First</span>
            <span class="previous paginate_button paginate_button_disabled" id="dyntable_previous">Previous</span>
            <span><span class="paginate_active">1</span>
                <span class="paginate_button">2</span>
                <span class="paginate_button">3</span>
                <span class="paginate_button">4</span>
                <span class="paginate_button">5</span>
            </span><span class="next paginate_button" id="dyntable_next">Next</span>
            <span class="last paginate_button" id="dyntable_last">Last</span>
        </div>
    </div>
@endsection