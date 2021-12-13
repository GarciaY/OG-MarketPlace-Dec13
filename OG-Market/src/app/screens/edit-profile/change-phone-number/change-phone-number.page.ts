import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { UserService } from '../../../services/user.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-change-phone-number',
  templateUrl: './change-phone-number.page.html',
  styleUrls: ['./change-phone-number.page.scss'],
})
export class ChangePhoneNumberPage implements OnInit {
  customerid: any;
  email: any;
  address: any;
  password: any;
  userphoto: any;
  datejoin: any;
  firstname: any;
  lastname: any;
  c: any;
  contactnumber: any;

  constructor(private fb: FormBuilder,  private _userservices:UserService, private router: Router) { }

  get contactNumber() {
    return this.profileForm.get('contactNumber');
  }

  profileForm = this.fb.group({
    contactNumber: [
      '',
      [
        Validators.required,
        Validators.pattern('^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-s./0-9]*$')
      ]
    ],
  });

  public errorMessages = {
    contactNumber: [
      { type: 'required', message: 'Phone number is required' },
      { type: 'pattern', message: 'Please enter a valid phone number' }
    ],
  };
  
  ngOnInit() {
    this.getUser()
  }
  getUser(){
   
    this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
    this.email = JSON.parse(localStorage.getItem('user')).email;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
  
}
  changephonenumber(){
    this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
    this.customerid = JSON.parse(localStorage.getItem('user')).customerid;
    this.email = JSON.parse(localStorage.getItem('user')).email;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.password = JSON.parse(localStorage.getItem('user')).password;
    this.userphoto = JSON.parse(localStorage.getItem('user')).userphoto;

    let data = {
      customerid: this.customerid ,
      email: this.email,
      firstname: this.firstname,
      lastname: this.lastname,
      address: this.address,
      contactnumber: this.contactNumber.value,
      password: this.password,
      userphoto: this.userphoto
      
    }
    console.log(data);

    this._userservices.updateRequest(data).subscribe((res:any) => {
      console.log(res);
    });
  }


  onSubmit(){
    console.log(this.profileForm.value)
  }
}
