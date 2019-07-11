@extends('layouts.master')
@section('title','Stats')
@section('pagebody')

<!-- Start Inner Contents -->       
        
     

<section class="myaccount-header">
    <div class="container">
    <h1>Stats</h1>
        </div>
</section>
<section class="myaccount-body">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="container-wrapper padding0">
            <div class="border-top">
                            <div class="price-wrap  stats">
                <h2>Statistical Data</h2>
                <table>
                  <tr>
                    <td>1</td>
                    <th>Total amount money invested by investors</th>
                    <th align="center">$ {{ $totalFunds }}</th>
                  </tr>
                  <tr>
                    <td>2</td>
                    <th>Total amount of money donated by supporters </th>
                    <th align="center">$ {{$totalDonations}}</th>
                  </tr>
                  <tr>
                    <td>3</td>
                    <th>The number of African Diaspora based enterpreneurs</th>
                    <th colspan="2" align="center">{{ $totalAfricanDiasporaBasedEnterpreneurs }}</th>
                  </tr>
                  <tr>
                    <td>4</td>
                    <th>The number of Social Entrepreneur based enterpreneurs</th>
                    <th colspan="2" align="center">{{ $totalSocialEntrepreneurBasedEnterpreneurs }}</th>
                  </tr>
                  <tr>
                    <td>5</td>
                    <th>The number of Women owned enterpreneurs</th>
                    <th colspan="2" align="center">{{ $totalWomenOwnedEnterpreneurs }}</th>
                  </tr>
                  <tr>
                    <td>6</td>
                    <th>The number of Youth owned enterpreneurs</th>
                    <th colspan="2" align="center">{{ $totalYouthOwnedEnterpreneurs }}</th>
                  </tr>
                                    <!--
                  <tr>
                    <td>7</td>
                    <th> The number of youth entrepreneurs trainers </th>
                    <th align="center">--</th>
                  </tr>
                  <tr>
                    <td>8</td>
                    <th> The number of mentors, advisors, and coaches</th>
                    <th align="center">2 Supporters</th>
                  </tr>
                  
                  -->
                  <tr>
                    <td>9</td>
                    <th> The number of countries hosting AIM enterprises</th>
                    <th>2</th>
                  </tr>
                  <tr>
                    <td>10</td>
                    <th> The number of publications on youth employment</th>
                    <th align="center">--</th>
                  </tr>
                  <tr>
                    <td>11</td>
                    <th>The number of investors</th>
                    <?php $investors = DB::table('userdetails')->where('groupid','4')->count(); ?>
                    <th colspan="2" align="center">{{ $investors }}</th>
                  </tr>
                  <tr>
                    <td>12</td>
                    <th>The number of supporters</th>
                    <th colspan="2" align="center">{{ $supporters }}</th>
                  </tr>
                  <tr>
                    <td>13</td>
                    <th>The number of youth jobs</th>
                   <th align="center">0</th>
                  </tr>
                  <tr>
                   <td>14</td>
                    <th>The number of male entrepreneurs</th>
                    <th>{{ $totalMaleEntrepreneurs}}</th>
                  </tr>
                  <tr>
                    <td>15</td>
                    <th>The number of female entrepreneurs</th>
                    <th>{{ $totalFemaleEntrepreneurs}}</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection