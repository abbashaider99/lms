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
                                  <h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#C9BC20;line-height:135%;">
                                    {{ $bookTitle }}</h2>
                                  <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">book has been Returned Successfully </div>
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
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td align="center" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                        <tr>
                          <td align="center" valign="top" width="500" class="flexibleContainerCell">
                            <table border="0" cellpadding="30" cellspacing="0" width="100%">
                              <tr>
                                <td align="center" valign="top">

                                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                      <td valign="top" class="textContent">
                                        <h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Dear {{$studentName}}, </h3><br>
                                        <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;">
                                            We hope this message finds you well. It appears that you've recently returned the book '{{ $bookTitle }}' to our library. Thank you for returning it!
                                            <br><br>
                                            <strong>Book Details:</strong>
                                            <ul>
                                                <li><strong>Title:</strong> {{ $bookTitle }}</li>
                                                <li><strong>Issue Date:</strong> {{ date('Y-m-d', strtotime($issueDate)) }}</li>
                                                <li><strong>Return Date:</strong> {{ date('Y-m-d', strtotime($returnDate)) }}</li>
                                            </ul>
                                            <br>
                                            As a reminder, please review the details of your return:
                                            <ul>
                                                <li><strong>Fine Amount:</strong> Rs.{{$fineAmount}}/-</li>
                                            </ul>
                                            <br>
                                            If you have any questions or concerns about the fine details or your library account, feel free to contact our library team. We appreciate your prompt attention to this matter.
                                            <br><br>
                                            Thank you for using our library services. Happy reading!
                                            <br><br>
                                            Best Regards, <br>
                                            Team Abbas Library.
                                        </div>
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
                                        <a style="color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="#" target="_blank">View Issued Books</a>
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