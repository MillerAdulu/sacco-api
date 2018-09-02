<div>
  Click on this link to log in to your account: <a href="https://sedcadmin.herokuapp.com">https://sedcadmin.herokuapp.com</a> <br>
  Name: {{ $member->last_name}}, {{ $member->first_name }} {{ $member->other_name }} <br>
  Phone: {{ $member->phone_number}} <br>
  Email: {{ $member->email }} <br>
  Password: {{ $member->password }}
</div>