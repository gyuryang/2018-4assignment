
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>글보기</h1>
                                            <div class="subject">
                                                <small>[제목]</small><?=$article->title?>
                                            </div>
                                            <div class="post-bottom overflow">
                                                
                                                <ul class="nav navbar-nav post-nav">
                                                    <li><i class="fa fa-tag"></i> 작성자 : <?=$users->username?> [<?=$users->nickname?>]</li>
                                                    <li><i class="fa fa-clock-o "></i> 작성일 : <?=$article->write_date?></li>
                                                    <li><i class="fa fa-comments"></i> 조회 : <?=$article->hit?></li>
                                                </ul>
                                            </div>
                                            <div class="viwebox">
                                                <?=$article->content?>
                                            </div>
                                            <hr>
                                            <div class="pull-right">
                                                <button class="btn btn-default btn-sm" type="button" onclick="window.location='/blog/myblog'">목록보기</button>
                                                <button class="btn btn-default btn-sm" type="button" onclick="window.location='/<?=$id?>/reply/<?=$midx?>/<?=$aidx?>'">답글</button>
                                                <button class="btn btn-default btn-sm" type="button" onclick="window.location='/<?=$id?>/modify/<?=$midx?>/<?=$aidx?>'">수정</button>
                                                <button class="btn btn-default btn-sm" type="button" onclick="window.location='/<?=$id?>/view_del/<?=$midx?>/<?=$aidx?>'">삭제</button>
                                            </div>
                                        </div>
                                        <div class="commentwrite col-md-12 row">
                                        <h2 class="bold">Comments</h2>
                                            <form action="/blog/coment_action" method="post">
                                                <input type="hidden" value="<?=$aidx?>" name="aidx">
                                                <textarea class="margin-bottom-20" type="text" name="content" required></textarea>
                                                <button type="submit">등록</button>
                                            </form>
                                        </div>
                                        <div class="response-area col-md-12 row">
                                            <ul class="media-list">
                                                <?php foreach ($coment as $key => $v) {?>
                                                <li class="media">
                                                    <div class="post-comment">
                                                        <div class="media-body">
                                                            <span><i class="fa fa-user"></i><?=$v->username?>[<?=$v->nickname?>]</span>
                                                            <textarea class="t<?=$v->idx?>" style="width:100%;" readonly><?=$v->content?></textarea>
                                                            <ul class="nav navbar-nav post-nav">
                                                                <li><i class="fa fa-clock-o"></i><?=$v->write_date?></li>
                                                            </ul>
                                                        </div>

                                                        <div class="pull-right">
                                                            <button class="btn btn-default btn-xs CoRe" type="button" data-idx="<?=$v->idx?>">수정</button>
                                                            <button class="btn btn-default btn-xs CoDel" type="button" data-idx="<?=$v->idx?>">삭제</button>
                                                        </div>
                                                    </div>                                                   
                                                </li>
                                               <?php } ?>
                                            </ul>                   
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- content inner -->

                </div>
            </div>
        </div>
    </section>
    <script>
        window.onload = function(){
            $(".CoRe").click(function(){
                let idx = $(this).data('idx');
                if($(this).text() == "완료"){
                    let content = $(`.t${idx}`).val();
                    $.ajax({
                        url : '/blog/coment_re',
                        type : 'POST',
                        data : {idx:idx, content:content},
                        success : _ => location.reload()
                    })
                    return;
                }
                $(`.t${idx}`).removeAttr("readonly").css({"border" : "1px solid black"});
                $(this).text("완료");
            })
            $(".CoDel").click(function(){
                let idx = $(this).data('idx');
                $.ajax({
                    url : '/blog/coment_del',
                    type : 'POST',
                    data : {idx:idx},
                    success : _ => location.reload()
                })
            })
        }
    </script>