<div id="content">
    <div id="three_step_checkout" class="ch-container">
        <div role="main" class="container_24">
            <div data-value="jauhar" class="main_content third_step">
                <div class="grid_18 left_module">
                    <form id="payment_information_form" action="/checkout/step/paymentinformation/" method="post">
                        <div style="display:none"><input value="cea9847660c2f4e83eec40f25f0d08ab1fd5fc43" name="FORM_TOKEN" type="hidden"></div><input name="PaymentMethod[empty]" value="1" type="hidden">

                        <!--  Fall back file for ventures which are not supporting tax_code -->
                        <div class="grid_18 payment_form">
                            <div class="form_title"><p>Pilih Opsi Pembayaran</p></div>
                            <div id="tabs-container" class="payment_method_select">
                                <div class="payment-options-holder-loading hide" style="display: none;">
                                    <div class="loaddingHolder">
                                        <span class="i-loader"></span>
                                    </div>
                                </div>
                                <div id="tabs">
                                    <ul>

                                        <li><a href="#tabs-unselected" id="tab_unselected_option" style="height: 0px"><span></span></a></li>



                                        <li><a href="#tabs-CashOnDelivery" id="tab_CashOnDelivery_option"><div class="tab_pseudo-elems"><span>Bayar di Tempat</span></div></a></li>


                                        <li><a class="ui-tabs-active" href="#tabs-Cybersource" id="tab_Cybersource_option"><div class="tab_pseudo-elems"><span>Kartu Kredit</span></div></a></li>

                                        <li><a href="#tabs-ManualBankTransferId" id="tab_ManualBankTransferId_option"><div class="tab_pseudo-elems"><span> Bank Transfer</span></div></a></li>
                                        <li><a href="#tabs-BCA_KlikPay" id="tab_BCA_KlikPay_option"><div class="tab_pseudo-elems"><span>BCA KlikPay</span></div></a></li>






                                        <li><a href="#tabs-MandiriClickpay" id="tab_MandiriClickpay_option"><div class="tab_pseudo-elems"><span>Mandiri ClickPay</span></div></a></li>


                                        <li><a href="#tabs-DOKUInstallment" id="tab_DOKUInstallment_option"><div class="tab_pseudo-elems"><span>Cicilan Online</span></div></a></li>

                                    </ul>
                                </div>

                                <div class="tab-wrapper">

                                    <div id="payments-tabs-wrapper">
                                        <div style="display: none;" id="tabs-unselected" class="tab hidden">
                                            <div class="payment_notavail_page">
                                                <div class="payment_wrap">
                                                    <div class="notavail_announcement">
                                                        Pilih metode pembayaran        </div>
                                                </div>
                                            </div>
                                            <div class="space_35"></div>
                                        </div>
                                        <div style="display: none;" id="tabs-CashOnDelivery" class="tab hidden">
                                            <div class="payment_notavail_page">
                                                <div class="payment_wrap">
                                                    <div class="notavail_icon"></div>
                                                    <div class="notavail_announcement">
                                                        Bayar di tempat tidak tersedia untuk produk Barata. 
                                                        Silakan gunakan metode pembayaran lainnya atau keluarkan Xiaomi Yi 
                                                        Action Camera - Hijau dari troli.            </div>
                                                </div>
                                            </div>
                                            <div class="space_35"></div>
                                        </div>


                                        <div id="tabs-Cybersource" class="tab ">
                                            <div class="payment_page">

                                                <div class="payment_wrap">
                                                    <div class="clear"></div>
                                                </div>


                                                <div class="newcard_wrap">
                                                    <div class="tb_credit_cart_new">
                                                        <div class="newcard_wrap t_footer">
                                                            <div style="display: none;">
                                                                <input id="Cybersource" class="payment-method-option ui-inputRadio lfloat select_payment_option" value="Cybersource" checked="checked" name="PaymentMethodForm[payment_method]" type="radio">                            </div>

                                                            <input id="PaymentMethodForm_parameter_cc_type" name="PaymentMethodForm[parameter][cc_type]" value="2" type="hidden">
                                                            <div id="newCreditCard" class="payment_new_credit_form ">
                                                                <div class="t_row">
                                                                    <div class="t_label">
                                                                        <div class="card-number">
                                                                            <label for="PaymentMethodForm_parameter_cc_number">Nomor Kartu</label>                                    </div>
                                                                        <div class="card_t cardLayout">
                                                                            <div class="card_icon icon_payment_master_small"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="t_input">
                                                                        <input name="PaymentMethodForm[parameter][cc_number]" class="input_field short_input checkFraud" size="50" maxlength="30" id="PaymentMethodForm_parameter_cc_number" value="5" type="text">                                </div>
                                                                    <div class="t_validation">
                                                                    </div>
                                                                </div>

                                                                <div class="t_row">
                                                                    <div class="t_label"><label for="PaymentMethodForm_parameter_cc_holder">Nama di Kartu</label></div>
                                                                    <div class="t_input">
                                                                        <input name="PaymentMethodForm[parameter][cc_holder]" class="input_field short_input " autocomplete="off" placeholder="Nama di Kartu" size="50" maxlength="50" id="PaymentMethodForm_parameter_cc_holder" value="jauhar" type="text">                                </div>
                                                                    <div class="t_validation">
                                                                    </div>
                                                                </div>

                                                                <div class="t_row payment_exp-row">
                                                                    <div class="t_label">
                                                                        <label>Expiry Date</label>                                </div>
                                                                    <div class="t_input">
                                                                        <input name="PaymentMethodForm[parameter][cc_exp_month]" class="input_field short_input " autocomplete="off" placeholder="Mm" size="2" maxlength="2" id="PaymentMethodForm_parameter_cc_exp_month" type="text">                                    &nbsp;
                                                                        <input name="PaymentMethodForm[parameter][cc_exp_year]" class="input_field short_input " autocomplete="off" placeholder="Yy" size="2" maxlength="2" id="PaymentMethodForm_parameter_cc_exp_year" type="text">                                </div>
                                                                    <div class="t_validation">
                                                                    </div>
                                                                </div>

                                                                <div class="t_row payment_cc_code-row">
                                                                    <div class="t_label">
                                                                        <label for="PaymentMethodForm_parameter_cc_security_code">CCV / CVV</label>                                    <div class="hint_t_icon" id="cvv-what-is-this">
                                                                            <a href="javascript:void(0)" class="hint_icon">?</a>
                                                                            <div id="payment-tool-tip" class="checkout-tool-tip" style="display: none">
                                                                                <div class="block-content"><div class="ccv_img"></div></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="t_input">
                                                                        <input name="PaymentMethodForm[parameter][cc_security_code]" class="input_field short_input_2 checkFraud" size="50" maxlength="30" id="PaymentMethodForm_parameter_cc_security_code" type="text">                                </div>
                                                                    <div class="t_validation">
                                                                    </div>
                                                                </div>

                                                                <div class="clear"></div>

                                                                <input name="PaymentMethodForm[parameter][is_cc_pasted]" id="isCCPasted" value="" type="hidden">

                                                                <div style="margin-top: 10px;padding-right: 15px;font-size: 11px;color: #919191;">Ubah transaksi kartu kredit Anda menjadi program cicilan 3 bulan untuk min. Rp 1.000.000. Berlaku untuk:<br><img src="Pilih%20metode%20pembayaran_files/cc-installment-6.png" style="height: 12px;margin-top: 5px;"></div></div>

                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card_logo-wrapper">
                                                <div class="card_logo master"></div>
                                                <div class="card_logo visa"></div>
                                            </div>
                                        </div>

                                        <div style="display: none;" id="tabs-ManualBankTransferId" class="tab">
                                            <div class="btransfer_page">
                                                <div class="payment_wrap">
                                                    <input id="ManualBankTransferId" value="ManualBankTransferId" class="hidden" name="PaymentMethodForm[payment_method]" type="radio">
                                                    <p class=""><strong>Pemesanan dengan Bank Transfer akan otomatis dibatalkan oleh sistem kami jika pembayaran tidak diterima dalam waktu 24 jam.:</strong></p>

                                                    <div class="clear"></div>
                                                    <br>
                                                    <div class="bank_label"><label for="PaymentMethodForm_parameter_senderName">Pilih Bank Yang Anda Gunakan :</label></div>
                                                    <select class="mainBanks" name="PaymentMethodForm[parameter][bankNamePrimary]" id="PaymentMethodForm_parameter_bankNamePrimary">
                                                        <option selected="selected" value="">Pilih</option>
                                                        <option value="BCA ATM">BCA ATM Otomatis</option>
                                                        <option value="BCA Non ATM">BCA Non ATM</option>
                                                        <option value="Mandiri">Mandiri</option>
                                                        <option value="BNI">BNI</option>
                                                        <option value="CIMB Niaga">CIMB Niaga</option>
                                                        <option value="Bank Lainnya">Bank Lainnya</option>
                                                    </select>					<div class="bank_validation">
                                                    </div>
                                                    <div class="bank_validation">
                                                    </div>
                                                    <br>
                                                    <div class="sender_label"><label for="PaymentMethodForm_parameter_senderName">Nama Pengirim</label></div>
                                                    <div class="sender_input">
                                                        <input name="PaymentMethodForm[parameter][senderName]" class="input_field short_input" autocomplete="off" placeholder="nama yang tertera pada rekening pengirim" size="80" maxlength="30" id="PaymentMethodForm_parameter_senderName" type="text">					</div>
                                                    <div class="sender_validation">
                                                    </div>
                                                    <div class="space_15"></div>
                                                    <div class="w85_divider"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: none;" id="tabs-BCA_KlikPay" class="tab hidden">
                                            <div class="installment_page">
                                                <div class="installment_wrap">
                                                    <input id="BCA_KlikPay" value="BCA_KlikPay" class="hidden" name="PaymentMethodForm[payment_method]" type="radio">
                                                    <p class="installment_title_card">Bayar pesanan Anda dengan:</p>
                                                    <span class="bdo_info">
                                                        Setelah melakukan konfirmasi pesanan, Anda akan 
                                                        terhubung dengan laman BCA KlikPay untuk konfirmasi pembayaran.         
                                                    </span>
                                                    <input value="fullPayment" name="PaymentMethodForm[parameter][bca_list]" id="PaymentMethodForm_parameter_bca_list" type="hidden">            </div>
                                                <div class="space_15"></div>
                                                <div class="w85_divider"></div>
                                            </div>
                                        </div>






                                        <div style="display: none;" id="tabs-MandiriClickpay" class="tab hidden">
                                            <div class="cod_page">
                                                <div class="payment_wrap">
                                                    <div>
                                                        <input id="MandiriClickpay" value="MandiriClickpay" class="hidden" name="PaymentMethodForm[payment_method]" type="radio">					<p class="installment_title_card">Bayar pesanan Anda dengan:</p>
                                                        <div class="clear"></div>
                                                        <p> - Anda diperlukan untuk memiliki User ID Mandiri Clickpay dan Token Mandiri</p>
                                                        <p> - Pastikan anda sudah aktivasi Mandiri Clickpay anda di www.bankmandiri.co.id</p>

                                                        <div class="t_row" style="margin-top:20px;">
                                                            <div class="t_label"><label for="PaymentMethodForm_parameter_cc_klikpay">Nomor Kartu</label></div>
                                                            <div class="t_input">
                                                                <input name="PaymentMethodForm[parameter][cc_number_klikpay]" class="input_field short_input" placeholder="" size="16" maxlength="16" id="PaymentMethodForm_parameter_cc_number_klikpay" type="text">                        </div>
                                                            <div class="t_validation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: none;" id="tabs-DOKUInstallment" class="tab hidden">
                                            <div class="payment_notavail_page">
                                                <div class="payment_wrap">
                                                    <div class="notavail_icon"></div>
                                                    <div class="notavail_announcement">
                                                        Maaf, metode pembayaran cicilan tidak berlaku untuk produk yang Anda pilih dalam troli belanja.            </div>
                                                </div>
                                            </div>
                                            <div class="space_35"></div>
                                        </div>
                                        <input id="ActiveTabIndexValue" data-paymentmethod="" value="2" type="hidden">
                                    </div>
                                    <div id="tab-common" class="tab tab-common" style="">
                                        <div class="payment_page">


                                            <div id="place_order_default">
                                                <div class="action_btn">
                                                    <div class="row">
                                                        <input name="send" value="1" type="hidden">
                                                        <button style="opacity: 1; cursor: pointer;" id="placeYourOrderBtn" type="submit" class="submit_btn cod_btn">
                                                            <span id="placeYourOrderButtonText" class="submit_btn_text">Konfirmasi Pesanan</span>
                                                            <span class="submit_btn_icon"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="cod_inform">
                                                        Anda akan menerima konfirmasi order melalui email dan sms.        </div>
                                                </div>
                                            </div>

                                            <div class="space_35 ch-space"></div>

                                        </div>
                                        <div class="space_15"></div>
                                    </div>
                                    <div style="display: none;" id="please-select-something">
                                        <span class="please-select-text"><span class="please-select-arrow"></span>Pilih metode pembayaran</span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                    </form>    </div>
                <div class="grid_6 right_module">
                    <div class="shippingto_container">
                        <div class="shippingto_title">
                            <p>Kirim ke</p>
                            <a href="https://www.lazada.co.id/checkout/step/deliveryinformation/">change</a>
                        </div>
                        <div class="shippingto">
                            <div class="address">
                                <span class="ch-fullname">jauhar </span>
                                <span class="ch-telephone">85732899137</span>

                                <span class="ch-address">
                                    Desa Menilo kec.soko kab.tuban rt.26 rw.03        </span>

                                <span class="ch-city-name">
                                    Jawa Timur - Kab. Tuban - Soko                        </span>
                                <span class="ch-address-shipping-to hide">
                                    Nomor Handphone: 85732899137<br>
                                </span>
                            </div>
                            <hr class="ch-separate-line">
                            <div class="billing">
                                <span class="ch-fullname">Gunakan juga sebagai alamat penagihan</span>        </div>
                        </div>
                    </div>
                    <div style="position: relative;" id="mini-cart"><div class="order_sum_container">
                            <form onsubmit="return false;">
                                <div class="order_sum_title ch-header-orange"><p>Detil Order</p></div>
                                <div class="order_sum">
                                    <input name="num_cart_item" id="num_cart_item" value="2" type="hidden">
                                    <p>Ada 2 item di troli Anda</p>
                                    <table class="order_scroll_table_header">
                                        <tbody>
                                            <tr>
                                                <th class="left_align">Produk</th>
                                                <th class="qty">Kuantitas</th>
                                                <th class="right_align">Harga</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="order_scrollable">
                                        <table class="order_scroll_table">
                                            <tbody><tr class="first_item  no-border  ">
                                                    <td class="no-padding-bottom">
                                                        <div class="product">Nikon D3200 - 24.2 MP - Lensa Kit 18-55mm + Memori SDHC 8 GB</div>
                                                    </td>
                                                    <td class="qty no-padding-bottom">

                                                        <select class="checkout-product-actions-select checkout-product-item-cell-qty-select" name="qty_NI743EL44CWDANID-58947" id="qty__NI743EL44CWDANID-58947" title="Kuantitas">
                                                            <option selected="selected">1</option>
                                                            <option>2</option>
                                                        </select>

                                                        <a class="checkout_remove_item" id="checkout_remove_sku__NI743EL44CWDANID-58947" href="#">hapus</a>
                                                    </td>
                                                    <td class="right_align no-padding-bottom sel-cart-item-total-NI743EL44CWDANID-58947">
                                                        4.699.000                                                            </td>
                                                </tr>
                                                <tr class="">
                                                    <td colspan="2">
                                                        Pengiriman Standar                                <p class="delivery-time">
                                                            13 Aug - 15 Aug                                </p>
                                                    </td>
                                                    <td class="no-padding-top right_align">
                                                        <a href="https://www.lazada.co.id/checkout/step/deliveryinformation/">change</a>
                                                    </td>
                                                </tr>
                                                <tr class="no-border  ">
                                                    <td class="no-padding-bottom">
                                                        <div class="product">Xiaomi Yi Action Camera - Hijau</div>
                                                    </td>
                                                    <td class="qty no-padding-bottom">

                                                        <select class="checkout-product-actions-select checkout-product-item-cell-qty-select" name="qty_XI619ELAZTU2ANID-1104557" id="qty__XI619ELAZTU2ANID-1104557" title="Kuantitas">
                                                            <option selected="selected">1</option>
                                                            <option>2</option>
                                                        </select>

                                                        <a class="checkout_remove_item" id="checkout_remove_sku__XI619ELAZTU2ANID-1104557" href="#">hapus</a>
                                                    </td>
                                                    <td class="right_align no-padding-bottom sel-cart-item-total-XI619ELAZTU2ANID-1104557">
                                                        1.999.000                                                            </td>
                                                </tr>
                                                <tr class="">
                                                    <td colspan="2">
                                                        Pengiriman Standar                                <p class="delivery-time">
                                                            08 Sep - 12 Sep                                </p>
                                                    </td>
                                                    <td class="no-padding-top right_align">
                                                        <a href="https://www.lazada.co.id/checkout/step/deliveryinformation/">change</a>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </div>
                                    <div style="display: none;">
                                        <div id="delivery_total_shipping_standard">
                                            <span></span>Pengiriman Standar -                         RP 64.800                                                    <div class="delivery-types_hint delivery-types_hint_icon">
                                                <div class="popup_delivery_hint hide">
                                                    Untuk produk lokal: Wilayah Jakarta 4 - 9 hari kerja dan Luar Jakarta 6-14 hari kerja
                                                    <br><br>
                                                    Untuk produk internasional: Wilayah Jakarta dan Luar Jakarta 45 - 48 hari kerja                                </div>
                                            </div>
                                        </div>
                                    </div><table class="total_item">
                                        <tbody><tr id="addCoupon" class="">
                                                <td colspan="3" class="voucher_input">
                                                    Anda punya voucher?&nbsp;<a id="addCouponBtn" href="javascript:void(0);">OK</a>
                                                </td>
                                            </tr>
                                            <tr id="coupon-body" class="redeem_step2 hide">
                                                <td colspan="3" class="voucher_input">
                                                    <input id="coupon" autocapitalize="off" autocorrect="off" placeholder="Masukkan kode voucher" name="couponcode" class="voucher_input_field " type="text">
                                                    <button name="voucher_btn" class="voucher_btn" id="couponSend">
                                                        <span class="voucher_icon"></span>
                                                        <span class="voucher_text">OK</span>
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr><td colspan="3"></td></tr>
                                            <tr>
                                                <td class="subtotal sel-subtotal">Subtotal</td>
                                                <td colspan="2" class="right_align">RP 6.698.000</td>
                                            </tr>


                                            <tr>
                                                <td class="subtotal shipping_cost_notice">Ongkos kirim</td>
                                                <td colspan="2" class="right_align shipping_cost_notice shipping_fee ">RP 64.800</td>
                                            </tr>


                                            <tr class="total ">
                                                <td class="total">
                                                    Total                                                <span class="vat-minicart">(Termasuk PPN)</span>
                                                </td>
                                                <td colspan="2" class="total right_align sel-total">
                                                    RP 6.762.800                    </td>
                                            </tr>

                                        </tbody></table>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="SSLSecured" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications." border="0" cellpadding="2" cellspacing="0" width="230">
                        <tbody><tr>
                                <td align="center" valign="top" width="115">
                                    <a href="https://pci.usd.de/compliance/2699-A56A-3DF4-7C58-1E83-BD98/details_en.html" target="_blank" class="jan_verisign" onclick="window.open(this.href, '', 'width = 600, height = 615, left = 100, top = 200'); return false;"></a>
                                </td>
                                <td align="center" valign="top" width="115">
                                    <span class="seal_verisign"></span>
                                </td>
                            </tr>
                        </tbody></table>
                </div>
                <div class="grid_6 securelogo"></div>
            </div>

            <div id="dialogProcessing" class="ui-dialog ui-dialogProcessing" style="display: none;">
                <div class="container">
                    <p id="dialogProcessingInfo1" class="pbm"><strong>Mohon tunggu, kami sedang memproses pesanan Anda</strong></p>
                    <p id="dialogProcessingInfo2" class="pvm" style="display:none;">Mohon tidak melakukan reload situs atau menutup browser sampai pesanan Anda selesai di proses.</p>
                    <img alt="Mohon tunggu, kami sedang memproses pesanan Anda" src="Pilih%20metode%20pembayaran_files/processing-order-ani.gif">
                </div>
            </div>

            <p style="background:url(https://h.online-metrix.net/fp/clear.png?org_id=k8vif92e&amp;session_id=lazada_id5jhabo886dg60r02mis07g83r1&amp;m=1)"></p>
            <img src="Pilih%20metode%20pembayaran_files/clear_004.png" alt="">
            <script id="fingerprint" src="Pilih%20metode%20pembayaran_files/check.js" type="text/javascript">
            </script>
            <object type="application/x-shockwave-flash" data="Pilih%20metode%20pembayaran_files/fp.swf" id="thm_fp" height="1" width="1">
                <param name="movie" value="https://h.online-metrix.net/fp/fp.swf?org_id=k8vif92e&amp;session_id=lazada_id5jhabo886dg60r02mis07g83r1">
                <div></div>
            </object>
        </div>
        <div class="clear space_30"></div>
        <hr>
        <div class="container_24 checkout_footer">
            <div class="grid_12 "><div class="hotline">Butuh Bantuan? Hubungi <strong>021 60206200</strong></div></div>
            <div class="grid_12 footer_nav">
                <ul>
                    <!--            <li><a href="--><!--/" title="--><!--" target="_blank">--><!--</a></li>-->
                    <li><a href="https://www.lazada.co.id/faq/" title="FAQ" target="_blank">FAQ</a></li>
                    <li><a href="https://www.lazada.co.id/payment-methods/" title="Kebijakan Pembayaran" target="_blank">Kebijakan Pembayaran</a></li>
                    <li class="last_item"><a href="https://www.lazada.co.id/terms-of-use/" title="Syarat &amp; Ketentuan" target="_blank">Syarat &amp; Ketentuan</a></li>
                </ul>
                <div class="grid_12"><div class="copyright">© Hak Cipta © 2013-2014  PT ECart Webportal Indonesia</div></div>
            </div>
        </div>
    </div>
</div>