import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { UserService } from '../../../services/user.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-change-name',
  templateUrl: './change-name.page.html',
  styleUrls: ['./change-name.page.scss'],
})
export class ChangeNamePage implements OnInit {
  customerid: any;
  address: any;
  contactnumber: any;
  password: any;
  userphoto: any;
  datejoin: any;
  email: any;
  fname: any;
  lname: any;
  mail: any;

  constructor(private fb: FormBuilder,  private _userservices:UserService,  private router: Router) { }

  get firstname() {
    return this.profileForm.get('firstname');
  }

  get lastname() {
    return this.profileForm.get('lastname');
  }
  
  profileForm = this.fb.group({
    firstname: ['', [Validators.required, Validators.maxLength(30)]],
    lastname: ['', [Validators.required, Validators.maxLength(30)]],
  });

  public errorMessages = {
    firstname: [
      { type: 'required', message: 'First name is required' },
      { type: 'maxlength', message: 'First name should not be longer than 30 characters' }
    ],
    lastname: [
      { type: 'required', message: 'Last name is required' },
      { type: 'maxlength', message: 'Last name should not be longer than 30 characters' }
    ],
  };

  ngOnInit() {
    this.getUser()
  }
  getUser(){
   
    this.fname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lname = JSON.parse(localStorage.getItem('user')).lastname;
    this.mail = JSON.parse(localStorage.getItem('user')).email;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
  
}
 


  changename(){
    this.customerid = JSON.parse(localStorage.getItem('user')).customerid;
    this.email = JSON.parse(localStorage.getItem('user')).email;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
    this.password = JSON.parse(localStorage.getItem('user')).password;
    this.userphoto = JSON.parse(localStorage.getItem('user')).userphoto;
    this.datejoin = JSON.parse(localStorage.getItem('user')).datejoin;

      
    let data = {
      customerid: this.customerid,
      email: this.email,
      firstname: this.firstname.value,
      lastname: this.lastname.value,
      address: this.address,
      contactnumber: this.contactnumber,
      password: this.password,
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
