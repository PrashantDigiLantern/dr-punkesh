<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content darkbackin">

              <div class="modal-body">

                <i type="button" class="btn-close fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>

                <section class="req-form darkbackin">

                  <div class="container con_cus">

                  <form class="form-sp">

                        <p  class="desk-v">Request a call back</p>

                          <input type="hidden" id="page5" value="requestCallbackMobile">

                          <input type="hidden" id="getid" value="5">

                          <input type="hidden" name="_token" id="token5" value="{{ csrf_token() }}">



                        

                          <input placeholder="Name*"  id="name5" name="name"><p id="validname5" class="error"></p>

                          <input placeholder="Phone*"  type="tel" id="phone5" maxlength="10" name="phone" class="form-control">

                          <p id="validphone5" class="error"></p>

                    
                        <div class="cptchabox">
                            <div id="captcha_request_mobile"></div>

                            <button type="button" onclick="requestFormMobile()" class="comBtn BtnRfresh" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>

                       </div>

                            <input type="hidden" id="code1_request_mobile">

                            <input type="hidden" id="code1_appointment">

                            <input type="text" name="captcha" id="captcha5" class="form-control" maxlength="6" autocomplete="off" placeholder="Enter code">

                            <p id="validcaptcha5" class="error"></p>



                            <input type="button"  class="sub-but" type="button" onclick="checkvalidation('5')" value="Submit">

                        </form>

                  </div>

                </section>

              </div>

            </div>

          </div>

        </div>