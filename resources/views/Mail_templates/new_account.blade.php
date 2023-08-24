@include('Mail_templates.includes.head')

<table id="u_content_text_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:50px 35px 10px 40px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <div style="color: #000000; line-height: 180%; text-align: left; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 180%;"><span style="font-size: 18px; line-height: 32.4px; color: #000000;"><strong><span style="line-height: 32.4px; font-family: Montserrat, sans-serif; font-size: 18px;">Dear Mr./Mrs,</span></strong></span></p>
<p style="font-size: 14px; line-height: 180%;"><br /><span style="font-size: 16px; line-height: 28.8px; font-family: Montserrat, sans-serif;">{{$details['name']}} your account has created Successfully. Your Credentials are:</span></p>
<p>
  Email: {{$details['email']}}
</p>
<p>
  Password: {{$details['password']}}
</p>

  </div>

      </td>
    </tr>
  </tbody>
</table>

@include('Mail_templates.includes.footer')