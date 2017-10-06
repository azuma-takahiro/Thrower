<div class="container">
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%;">
            ショッピングカート
        </div>
        <div class="progress-bar progress-bar-success" role="progressbar" style="width: 25%;">
            お届け先
        </div>
        <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 25%;">
            お支払いを確定
        </div>
        <!-- <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 25%;">
            確定
        </div> -->
    </div>
    <table class="table table-bordered dest_area">
        <th class="active">お名前</th>
        <td class="form-inline"><?=$this->request->data['Order']['dest_name'];?></td>
    </table>
    <table class="table table-bordered item_area">

    </table>
</div>