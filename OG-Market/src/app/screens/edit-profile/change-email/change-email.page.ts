import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { UserService } from '../../../services/user.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-change-email',
  templateUrl: './change-email.page.html',
  styleUrls: ['./change-email.page.scss'],
})
export class ChangeEmailPage implements OnInit {
  customerid: any;
  firstname: any;
  lastname: any;
  address: any;
  contactnumber: any;
  password: any;
  userphoto: any;
  datejoin: any;
  mail: any;



  constructor(private fb: FormBuilder, private _userservices:UserService, private router: Router) { }

  get email() {
    return this.profileForm.get('email');
  }

  
  profileForm = this.fb.group({
    email: [
      '', 
    [ 
      Validators.required, 
      Validators.pattern('^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$')
      ]
    ],
  });

  public errorMessages = {
    email: [
      { type: 'required', message: 'Email is required' },
      { type: 'pattern', message: 'Please enter a valid email address' }
    ],
  };
  
  ngOnInit() {
    this.getUser()
    
  }
  getUser(){
   
    this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
    this.mail = JSON.parse(localStorage.getItem('user')).email;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
  
}
 
  

  changeemail(){
    this.customerid = JSON.parse(localStorage.getItem('user')).customerid;
    this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
    this.password = JSON.parse(localStorage.getItem('user')).password;
    this.userphoto = JSON.parse(localStorage.getItem('user')).userphoto;
    this.datejoin = JSON.parse(localStorage.getItem('user')).datejoin;
    
    let data = {
      customerid: this.customerid,
      email: this.email.value,
      firstname: this.firstname,
      lastname: this.lastname,
      address: this.address,
      contactnumber: this.contactnumber,
      password: this.password,
      userphoto: this.userphoto,
      datejoin: this.datejoin
    }
    console.log(data);

    this._userservices.updateRequest(data).subscribe((res:any) => {
      console.log(res)
      
    });
  }
  onSubmit(){
    console.log(this.profileForm.value);
  }
}

