<table id="deposit_slip">
	<tr>
		<td class='style5' colspan='4' rowspan='2'>Deliverance Center</td>
		<td class='style2' colspan='14'>1008 Congress Street - Portland, Maine 04102 - (207) 774-8192</td>
	</tr>
	<tr>
		<td class='style2' colspan='14'>CONTACT: Stephen Reynolds, Jr.,  EMAIL: info@deliverance.me</td>
	</tr>
	<tr>
	
		<td class='style18' >Deposit Date:</td>
		<td class='style15' colspan='2'>{{ $deposit->deposited }}</td>
		<td class='style18' colspan='5'>Account Number:</td>
		<td class='style15' colspan='3'>{{ $deposit->account->seriel}}</td>
		<td class='style18' colspan='5'>Nickname: </td>
		<td class='style15' colspan='2'>{{ $deposit->account->title }}</td>
	</tr>
	<tr>
		<td colspan='18'>&nbsp;</td>
	</tr>
	<tr>
		<td class='style15' style='height: 21' > </td>
		<td class='style15' style='height: 21' colspan='2'> </td>
		<td class='CoinsBills' rowspan='7' colspan='2'></td>
		<td class='CoinsBills' rowspan='7' ><span class='CoinsBills'>COINS</span></td>
		<td style='height: 21px' class='style18' colspan='3'>Pennies: </td>
		<td style='height: 21' class='style15' >{{$deposit->countOfPennies() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfPennies() }}</td>
		<td class='CoinsBills' rowspan='7' colspan='3'></td>
		<td rowspan='7' ><span class='CoinsBills'>BILLS</span></td>
		<td style='height: 21px' class='style18' >$1: </td>
		<td style='height: 21px' class='style15' >{{$deposit->countOfOneDollars() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfOneDollars() }}</td>
	</tr>
	<tr><!-- 14 -->
		<td class='style18' >Sum of Checks: </td>
		<td class='style15' colspan='2'>$&nbsp;{{$deposit->checksAmount()}}</td>
		<td class='style18' colspan='3'>Nickels: </td>
		<td class='style15' >{{$deposit->countOfNickels()}}</td>  
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfNickels() }}</td>
		<td class='style18' >$2: </td>
		<td class='style15' >{{$deposit->countOfTwoDollars()}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfTwoDollars() }}</td>
	</tr>
	<tr>
		<td class='style18' >Count of Checks: </td>
		<td class='style15' colspan='2'>{{ count($deposit->checks()) }}</td>
		<td class='style18' colspan='3'>Dimes:&nbsp; </td>
		<td class='style15' >{{$deposit->countOfDimes() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfDimes() }}</td>
		<td class='style18' >$5: </td>
		<td class='style15' >{{ $deposit->countOfFiveDollars() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfFiveDollars() }}</td>
	</tr>
	<tr>
		<td class='style18' >&nbsp;</td>
		<td class='style15' colspan='2'>&nbsp;</td>
		<td class='style18' colspan='3'>Quarters: </td>
		<td class='style15' >{{$deposit->countOfQuarters() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfQuarters() }}</td>
		<td class='style18' >$10: </td>
		<td class='style15' >{{$deposit->countOfTenDollars()}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfTenDollars() }}</td>
	</tr>
	<tr>
		<td class='style18' >Sum of Cash:</td>
		<td class='style15' colspan='2'>$&nbsp;{{$deposit->billsAmount() }}</td>
		<td class='style18' colspan='3'>Half Dollars: </td>
		<td class='style15' >{{$deposit->countOfHalfDollars() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfhalfDollars() }}</td>
		<td class='style18' >$20: </td>
		<td class='style15' >{{$deposit->countOfTwentyDollars() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfTwentyDollars() }}</td>
	</tr>
	<tr>
		<td class='style18' >Sum of Coins:</td>
		<td class='style15' colspan='2'>$&nbsp;{{$deposit->coinsAmount() }}</td>
		<td class='style15'  colspan='5' >&nbsp;</td>
		<td class='style18'  >$50: </td>
		<td class='style15' >{{$deposit->countOfFiftyDollars() }}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfFiftyDollars() }}</td>
	</tr>
	<tr>
		<td class='style18' >Deposit Total:</td>
		<td class='style15' colspan='2'>$&nbsp;{{$deposit->totalAmount()}}</td>
		<td class='style15'  colspan='5' >&nbsp;</td>
		<td class='style18' >$100: </td>
		<td class='style15'>{{$deposit->countOfHundredDollars()}}</td>
		<td style='height: 21' class='style15' ><!-- x&apos;s -->$ {{$deposit->amountOfHundredDollars() }}</td>
	</tr>
	<tr>
		<td colspan='18'></td>
	</tr>
	<tr>
		<th>Check #</th>
		<th colspan='2'>Check Amount</th>
		<td colspan='16'></td>
	</tr>
	
@foreach($deposit->checks() AS $c)
	@if ($c->other > 0)
	<?php $CheckAmount=number_format($c->other,2); ?>
		<tr>
			<td class='check_detail'>{{$c->seriel}}</td>
			<td class='check_detail' colspan='2'>$&nbsp;{{$c->other}}</td>
		</tr>
	@endif
@endforeach
</table>