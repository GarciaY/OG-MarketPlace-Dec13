import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { UserService } from '../../../services/user.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-change-password',
  templateUrl: './change-password.page.html',
  styleUrls: ['./change-password.page.scss'],
})
export class ChangePasswordPage implements OnInit {
  customerid: any;
  email: any;
  address: any;
  contactnumber: any;
  userphoto: any;
  datejoin: any;
  firstname: any;
  lastname: any;

  constructor(private fb: FormBuilder, private _userservices:UserService,  private router: Router) { }

  get password() {
    return this.profileForm.get('password');
  }
  profileForm = this.fb.group({
    

    password: [
      '', 
      [
        Validators.required,
        Validators.maxLength(20)
      ]
    ],
  });

  
  public errorMessages = {
    password: [
      { type: 'required', message: 'Password is required' },
      { type: 'maxlength', message: 'Password should not exceed at 20 characters'} 
    ]
  };

  ngOnInit() {
  }

  changepassword(){
    this.customerid = JSON.parse(localStorage.getItem('user')).customerid;
    this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
    this.email = JSON.parse(localStorage.getItem('user')).email;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
    this.userphoto = JSON.parse(localStorage.getItem('user')).userphoto;
    this.datejoin = JSON.parse(localStorage.getItem('user')).datejoin;

    let data = {
      customerid: this.customerid,
      email: this.email,
      firstname: this.firstname,
      lastname: this.lastname,
      address: this.address,
      contactnumber: this.contactnumber,
      password: this.password.value,
      userphoto: this.userphoto
    }

    console.log(data);

    this._userservices.updateRequest(data).subscribe((res:any) => {
      console.log(res)
    });
  
  }
  onSubmit(){
    console.log(this.profileForm.value)
  }

}
