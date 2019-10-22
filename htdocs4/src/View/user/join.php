 <section id="contents">
        <div class="container">
            <div class="row">
                <div class="main-content">
                    <h1 class="antitle">회원가입</h1>

                    <!-- content inner -->
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        <form class="signup-page" action="/user/join_process" method="post" enctype="multitype/form-data">
                            <div class="signup-header">
                                <h2>Register a new account</h2>
                            <label>아이디
                                <span class="color-red">*</span>
                            </label>
                            <input class="form-control margin-bottom-20" type="text" name="id">
                            <label>비밀번호
                                <span class="color-red">*</span>
                            </label>
                            <input class="form-control margin-bottom-20" type="password" name="pw">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>이름
                                        <span class="color-red">*</span>
                                    </label>
                                    <input class="form-control margin-bottom-20" type="text" name="username">
                                </div>
                                <div class="col-sm-6">
                                    <label>닉네임
                                        <span class="color-red">*</span>
                                    </label>
                                    <input class="form-control margin-bottom-20" type="text" name="nickname">
                                </div>
                            </div>
                            <label>프로필이미지
                                <span class="color-red">*</span>
                            </label>
                            <input class="form-control margin-bottom-20" type="file" name="img">
                            <div class="row">
                            <div class="col-md-12"> 
                                <label>설명
                                    <span class="color-red">*</span>
                                </label>
                                <textarea class="form-control" name="intro" required></textarea>
                            </div>
                        </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>Already a member? <br> Click 
                                        <a href="login.html">HERE</a>to login to your account.</p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-primary" type="submit">회원가입</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                    <!-- content inner -->

                </div>
            </div>
        </div>
    </section>