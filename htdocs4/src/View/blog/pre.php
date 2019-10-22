<!-- contents -->
    <section id="contents">
        <div class="container">
            <div class="row">
                <div class="main-content">
                    <h1 class="antitle">블로그관리</h1>

                    <!-- content inner -->

                    <div id="testimonial-container">
                        <div class="row">
                <?php if(ss()->id != 'admin'): ?>
                            <div class="margin-bottom">
                                <h2 class="page-header">메뉴등록</h2>
                                <div class="testimonial">
                                    <form class="menuwrite" action="/blog/menu_action" method="post">
                                        <label>메뉴이름
                                            <span class="color-red">*</span>
                                        </label>
                                        <input class="form-control margin-bottom-20" type="text" name="menuname">
                                        <div class="col-lg-12 text-right">
                                            <button class="btn btn-primary btn-sm" type="submit">메뉴등록</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="margin-bottom">
                                <h2 class="page-header">메뉴관리</h2>
                                <div class="testimonial menulist">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-1">
                                                    번호
                                                </th>
                                                <th class="col-md-4">
                                                    메뉴이름
                                                </th>
                                                <th class="col-md-4">
                                                    게시판아이디
                                                </th>
                                                <th>
                                                    설정
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($menu as $k => $v) {?>
                                            <tr>
                                                <td>
                                                    <?= $v->idx ?>
                                                </td>
                                                <td>
                                                    <?= $v->name ?>
                                                </td>
                                                <td>
                                                    <select class="form-control input-sm" id="idx<?= $v->idx ?>">
                                                        <option>선택</option>
                                                        <?php foreach($board as $key => $val) {?>
                                                            <option <?= $v->bidx==$val->idx? "selected" : "" ?> value="<?= $val->idx ?>"><?=$val->name?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-default btn-xs cre" type="button" data-idx="<?= $v->idx ?>">게시판등록</button>
                                                    <button class="btn btn-default btn-xs del" type="button" data-idx="<?= $v->idx ?>" data-table="menu">메뉴삭제</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="margin-bottom">
                                <h2 class="page-header">게시판등록</h2>
                                <div class="testimonial">
                                    <form class="menuwrite" method="post" action="/blog/board_action">
                                        <label>게시판아이디
                                            <span class="color-red">*</span>
                                        </label>
                                        <input class="form-control margin-bottom-20" type="text" name="name">
                                        <div class="col-lg-12 text-right">
                                            <button class="btn btn-primary btn-sm" type="submit">게시판등록</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="margin-bottom">
                                <h2 class="page-header">게시판리스트</h2>
                                <div class="testimonial menulist">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-1">
                                                    번호
                                                </th>
                                                <th class="col-md-8">
                                                    게시판아이디
                                                </th>
                                                <th>
                                                    설정
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php foreach($board as $key => $v){ ?>
                                            <tr>
                                                <td>
                                                    <?= $v->idx ?>
                                                </td>
                                                <td>
                                                    <?= $v->name ?>
                                                </td>                                                
                                                <td>
                                                    <button class="btn btn-default btn-xs del" type="button" data-idx="<?= $v->idx ?>" data-table="board">게시판삭제</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php if(ss()->id == 'admin'): ?>
                            <div class="margin-bottom">
                                <h2 class="page-header">회원리스트</h2>
                                <div class="testimonial menulist">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-1">
                                                    번호
                                                </th>
                                                <th>
                                                    아이디
                                                </th>
                                                <th>
                                                    이름
                                                </th>
                                                <th>
                                                    닉네임
                                                </th>
                                                <th>
                                                    블로그URL
                                                </th>
                                                <th>
                                                    삭제
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($users as $key => $v){ 
                                                if($v->id != 'admin') :?>
                                            <tr>
                                                <td>
                                                    <?= $v->idx ?>
                                                </td>
                                                <td>
                                                    <?= $v->id ?>
                                                </td>
                                                <td>
                                                    <?= $v->username ?>
                                                </td>
                                                <td>
                                                    <?= $v->nickname ?>
                                                </td> 
                                                <td>
                                                    <a href="http://localhost/<?= $v->nickname ?>">http://localhost/<?= $v->nickname ?></a>
                                                </td>                                                 
                                                <td>
                                                    <button class="btn btn-danger btn-xs del" type="button" data-idx="<?= $v->idx ?>" data-table="users">회원삭제</button>
                                                </td>
                                            </tr>
                                            <?php endif; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                     </div>
                    </div>
                    <!-- content inner -->
                </div>
            </div>
        </div>
    </section>
    <script>
        window.onload = function(){
        
            $(".cre").click(function(){
                let idx = $(this).data('idx');
                let midx = $(`#idx${idx}`).val();
                $.ajax({
                    url : '/pre/cre',
                    type : 'POST',
                    data : {idx:idx, midx:midx},
                    success: _ => location.reload()
                })
            })
            $(".del").click(function(){
                let idx = $(this).data('idx');
                console.log(idx);
                let table = $(this).data('table');
                $.ajax({
                    url : '/pre/del',
                    type : 'POST',
                    data: {idx:idx, table:table},
                    success: _ => location.reload()
                })
            })
        }
    </script>
   