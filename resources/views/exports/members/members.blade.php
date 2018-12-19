<table>
    <thead>
        <tr>
            <th>Member ID</th>
            <th>ID/Passport No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Other Name</th>
            <th>Date of Birth</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>KRA Pin</th>
            <th>Gender</th>
            <th>Proposed Monthly Deposit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
            <td>{{ $member->member_id }}</td>
            <td>{{ $member->identification_number }}</td>
            <td>{{ $member->first_name }}</td>
            <td>{{ $member->last_name }}</td>
            <td>{{ $member->other_name }}</td>
            <td>{{ $member->date_of_birth }}</td>
            <td>{{ $member->phone_number }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->kra_pin }}</td>
            <td>{{ $member->gender == '' ? 'N/A' : $member->gender == false ? 'MALE' : 'FEMALE' }}</td>
            <td>{{ $member->proposed_monthly_deposit }}</td>
        </tr>
        @endforeach
    </tbody>
</table>