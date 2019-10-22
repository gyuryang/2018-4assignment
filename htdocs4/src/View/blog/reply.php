
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>답글쓰기</h1>
                                            <form class="boardwrite" action="/blog/reply_action" method="post">
                                                <input type="hidden" value="<?=$aidx?>" name="aidx">
                                                <input type="hidden" value="<?=$midx?>" name="midx">
                                                <input type="hidden" value="<?=$id?>" name="id">
                                                <label>제목
                                                    <span class="color-red">*</span>
                                                </label>
                                                <input class="form-control margin-bottom-20" type="text" name="title">
                                                <label>작성자
                                                    <span class="color-red">*</span>
                                                </label>
                                                <input class="form-control margin-bottom-20" type="text" name="writer" value="<?=$writer?>" readonly>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>내용
                                                            <span class="color-red">*</span>
                                                        </label>
                                                        <textarea class="form-control margin-bottom-20" name="content" required></textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-12 text-right">
                                                        <button class="btn btn-primary btn-sm" type="submit">글작성</button>
                                                        <button class="btn btn-default btn-sm" type="reset">다시작성하기</button>
                                                        <button class="btn btn-default btn-sm" type="button" onclick="history.back();">취소</button>
                                                    </div>
                                                </div>
                                            </form> 
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