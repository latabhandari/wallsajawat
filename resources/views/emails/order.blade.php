<html>
<head></head>
<body>

<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
  <tbody><tr>
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tbody><tr>
            <td class="header-lg">
              Your order has shipped!
            </td>
          </tr>
          <tr>
            <td class="free-text">
              We wanted to let you know that we just shipped off your order #{{ $order_number }}. You'll find all the details below.
            </td>
          </tr>
          <tr>
            <td class="button">
              <div><!--[if mso]>
                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                  <w:anchorlock/>
                  <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Track Order</center>
                </v:roundrect>
              <![endif]-->

              <a href="#" style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Track Order</a></div>
            </td>
          </tr>
          <tr>
            <td class="w320">
              <table cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr>
                  <td class="mini-container-left">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tbody><tr>
                        <td class="mini-block-padding">
                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tbody><tr>
                              <td class="mini-block">
                                <span class="header-sm">Shipping Address</span><br>
                                {!! $shipping_address !!}
                              </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                  <td class="mini-container-right">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tbody><tr>
                        <td class="mini-block-padding">
                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tbody><tr>
                              <td class="mini-block">
                                <span class="header-sm">Date Shipped</span><br>
                                {{ date('D, j M\'y', time() + (86400 * 3)) }}<br>
                                <br>
                                <span class="header-sm">Order #</span> <br>
                                {{ $order_number }}
                              </td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
              </tbody></table>
            </td>
          </tr>
        </tbody></table>
      </center>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
      <center>
        <table cellpadding="0" cellspacing="0" width="600" class="w320">
            <tbody><tr>
              <td class="item-table">
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                  	<tr>
	                    <td class="title-dark" width="300">
	                       Item
	                    </td>
	                    <td class="title-dark" width="163">
	                      Qty
	                    </td>
	                    <td class="title-dark" width="97">
	                      Total
	                    </td>
                    </tr>

                    @foreach ($cart_contents as $content)
	                  <tr>
	                    <td class="item-col item">
	                      <table cellspacing="0" cellpadding="0" width="100%">
	                        <tbody>
	                        	<tr>
			                          <td class="mobile-hide-img">
			                            <img width="110" height="92" src="{{ asset('catalog/product/'.$content['image']) }}" alt="{{ $content['name'] }}">
			                          </td>
			                          <td class="product">
			                            <span style="color: #4d4d4d; font-weight:bold;">{{ $content['name'] }}</span> <br>
			                            {!! $content['short_desc'] !!} <br>
										Size (Width x Height):{{ $content['width'] }} Feet x {{ $content['height'] }} Feet
			                          </td>
			                       </tr>
			                </tbody>
			             </table>
			            </td>
	                    <td class="item-col quantity">
	                      {{ $content['qty'] }}
	                    </td>
	                    <td class="item-col">
	                      Rs. {{ $content['price']  * $content['qty'] }}
	                    </td>
			          </tr>
			        @endforeach

                  <tr>
                    <td class="item-col item mobile-row-padding"></td>
                    <td class="item-col quantity"></td>
                    <td class="item-col price"></td>
                  </tr>


                  <tr>
                    <td class="item-col item">
                    </td>
                    <td class="item-col quantity" style="text-align:right; padding-right: 10px; border-top: 1px solid #cccccc;">
                      <span class="total-space">Subtotal</span> <br>
                      <span class="total-space">Discount</span>  <br>
                      <span class="total-space" style="font-weight: bold; color: #4d4d4d">Total</span>
                    </td>
                    <td class="item-col price" style="text-align: left; border-top: 1px solid #cccccc;">
                      <span class="total-space">Rs. {{ $total_amount }}</span> <br>
                      <span class="total-space">Rs. {{ $discount ? $discount : 0 }}</span><br>
                      <span class="total-space" style="font-weight:bold; color: #4d4d4d"><i class="fa fa-inr">&nbsp;</i>Rs. {{ $payable_amount }}</span>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>

        </tbody></table>
      </center>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7; height: 100px;">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tbody><tr>
            <td style="padding: 25px 0 25px">
              <strong>Wall Sajawat</strong><br>
              1234 Lajpat Nagar <br>
              Delhi,India <br><br>
            </td>
          </tr>
        </tbody></table>
      </center>
    </td>
  </tr>
</tbody></table>

</body>
</html>