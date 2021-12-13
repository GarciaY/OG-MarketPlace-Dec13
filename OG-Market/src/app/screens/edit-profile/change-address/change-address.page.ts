import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { UserService } from '../../../services/user.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-change-address',
  templateUrl: './change-address.page.html',
  styleUrls: ['./change-address.page.scss'],
})
export class ChangeAddressPage implements OnInit {
  customerid: any;
  email: any;
  password: any;
  userphoto: any;
  datejoin: any;
  firstname: any;
  lastname: any;
  contactNumber: any;
  contactnumber: any;
  add: any;

  // public barangay: string;

  constructor(private fb: FormBuilder,  private _userservices:UserService, private router: Router) { }

  get address(){
    return this.profileForm.get('address');
  }

  profileForm = this.fb.group({
    address: [
      '', 
      [
        Validators.required, 
        Validators.maxLength(30)
      ]
    ],
  });

  public errorMessages = {
    address: [
      { type: 'required', message: 'Address is required' },
      { type: 'maxlength', message: 'Your address cant be longer than 30 characters'}
    ],
  };

  ngOnInit() {
    this.getUser()
  }
  getUser(){
   
    this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
    this.email = JSON.parse(localStorage.getItem('user')).email;
    this.add = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
  
}


 
  changeaddress(){
    this.customerid = JSON.parse(localStorage.getItem('user')).customerid;
    this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
    this.email = JSON.parse(localStorage.getItem('user')).email;
    this.password = JSON.parse(localStorage.getItem('user')).password;
    this.contactNumber = JSON.parse(localStorage.getItem('user')).contactnumber;
    this.password = JSON.parse(localStorage.getItem('user')).password;
    this.userphoto = JSON.parse(localStorage.getItem('user')).userphoto;
    this.datejoin = JSON.parse(localStorage.getItem('user')).datejoin;

    let data = {
      customerid: this.customerid,
      email: this.email,
      firstname: this.firstname,
      lastname: this.lastname,
      address: this.address.value,
      contactnumber: this.contactNumber,
      password: this.password,
      userphoto: this.userphoto
      
    }

    console.log(data);

    this._userservices.updateRequest(data).subscribe((res:any) => {
      console.log(res)
    });
  }

  
  // selectedBarangay(e){

  //   console.log(e);
  //   console.log(this.barangay);

  // }
  onSubmit(){
    console.log(this.profileForm.value)
  }

}
