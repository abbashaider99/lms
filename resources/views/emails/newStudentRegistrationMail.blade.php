@extends('layouts.EmailLayouts.main')

@section('content')
          <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">

            <tr>
              <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF" bgcolor="#2E7D32">
                  <tr>
                    <td align="center" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                        <tr>
                          <td align="center" valign="top" width="500" class="flexibleContainerCell">
                            <table border="0" cellpadding="30" cellspacing="0" width="100%">
                              <tr>
                                <td align="center" valign="top" class="textContent">
                                  <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">
                                   Abbas Library</h1>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 20px;">
                  <tr>
                      <td valign="top">
                          <table border="0" cellpadding="10" cellspacing="0" width="100%" style="border-bottom: 1px solid #ddd;">
                              <tr>
                                  <td valign="top">
                                      <h2 style="color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 25px; font-weight: bold; margin: 0;">Welcome, {{$studentName}}!</h2>
                                      <p style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px; margin-bottom: 0; margin-top: 10px; color: #555; line-height: 1.5;">Thank you for registering as a new student. We are excited to have you as part of our community. If you have any questions or need assistance, feel free to reach out.</p>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td valign="top">
                          <table border="0" cellpadding="10" cellspacing="0" width="100%" style="border-top: 1px solid #ddd;">
                              <tr>
                                  <td valign="top">
                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                          <tr>
                                              <td valign="top">
                                                  <strong style="color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 18px; margin-bottom: 10px; display: block;">Student Details:</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td valign="top">
                                                  <table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                      <tr>
                                                          <td valign="top">
                                                              <strong style="color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px;">#ID:</strong> {{$studentID}}
                                                          </td>
                                                          <td valign="top">
                                                              <strong style="color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px;">Name:</strong> {{$studentName}}
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td valign="top">
                                                              <strong style="color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px;">Class:</strong> {{$studentClass}}
                                                          </td>
                                                          <td valign="top">
                                                              <strong style="color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px;">Email:</strong> {{$studentEmail}}
                                                          </td>
                                                      </tr>
                                                  </table>
                                              </td>
                                          </tr>
                                      </table>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
              </table>
              
              </td>
            </tr>

            <tr>
              <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
                  <tr>
                    <td align="center" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                        <tr>
                          <td align="center" valign="top" width="500" class="flexibleContainerCell">
                            <table border="0" cellpadding="30" cellspacing="0" width="100%">
                              <tr>
                                <td align="center" valign="top">
                                  <table border="0" cellpadding="0" cellspacing="0" width="50%" class="emailButton" style="background-color: #2E7D32;">
                                    <tr>
                                      <td align="center" valign="middle" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
                                        <a style="color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="#" target="_blank">View Profile</a>
                                      </td>
                                    </tr>
                                  </table>

                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>

          </table>
         @endsection 