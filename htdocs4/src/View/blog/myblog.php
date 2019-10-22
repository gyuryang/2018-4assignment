                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <?php if(isset($articles) && $bidx != 0): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1><?= $menu->name ?></h1>
                                            <div class="boardlist">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-md-1">번호</th>
                                                            <th class="col-md-6">제목</th>
                                                            <th>작성자</th>
                                                            <th>작성일</th>
                                                            <th>조회</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        foreach ($articles as $key => $v) {?>
                                                        <?php if($page*10>$j && $page*10-10<=$j) :?>
                                                        <tr>
                                                            <td><?= $v->idx ?></td>
                                                            <td>
                                                                <?php for ($i=0; $i <$v->depth ; $i++) { 
                                                                    echo "&nbsp;&nbsp;";     
                                                                } ?><a href="/<?=$id?>/view/<?=$midx?>/<?=$v->idx?>"><?=$v->depth>1? "└" : "";?><?= $v->title ?></a>
                                                            </td>
                                                            <td><?= $v->writer ?></td>
                                                            <td><?= $v->write_date ?></td>
                                                            <td><?= $v->hit ?></td>
                                                        </tr>
                                                    <?php endif; $j++;} ?>
                                                        <!-- <tr>
                                                            <td>2</td>
                                                            <td>
                                                                &nbsp;&nbsp;<a href="myblog_view.html">└ 게시물 리스트</a>
                                                            </td>
                                                            <td>관리자</td>
                                                            <td>2019-04-06</td>
                                                            <td>8</td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                                <div class="pull-right">
                                                    <button class="btn btn-default btn-sm" type="button" onclick="window.location='/<?=$id?>/write/<?=$midx?>'">글쓰기</button>
                                                </div>
                                            </div>
                                            <div class="portfolio-pagination">
                                                <ul class="pagination">
                                                  <li><a href="#">left</a></li>
                                                  
                                                  <?php foreach($articles as $key => $v){  ?>
                                                    <?php if($i%10 == 0):?>
                                                  <li <?= $page == ($i/10)? 'class="active"' : ''?>><a href="/<?= $id ?>/board/<?= $midx ?>/<?=$i/10 ?>"><?=$i/10?></a></li>
                                                  <?php endif;$i++;} ?>
                                                  <li><a href="#">right</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php endif; ?>
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
    
    <!-- footer -->
   