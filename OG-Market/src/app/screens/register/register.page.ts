import { Component, OnInit } from '@angular/core';
import { NavController } from '@ionic/angular';
import { UserService } from '../../services/user.service';
import { from } from 'rxjs';
import {FormBuilder,
        Validators
      } from '@angular/forms';
import { Router } from '@angular/router';


@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {

  
  // public barangay:string;

  constructor(private fb: FormBuilder,private _userservices: UserService, private navcontrol: NavController, private router: Router ) { }

  get firstname() {
    return this.profileForm.get('firstname');
  }

  get lastname() {
    return this.profileForm.get('lastname');
  }

  get email() {
    return this.profileForm.get('email');
  }

  get contactNumber() {
    return this.profileForm.get('contactNumber');
  }

  get address(){
    return this.profileForm.get('address');
  }

  get password() {
    return this.profileForm.get('password');
  }


  profileForm = this.fb.group({
    firstname: ['', [Validators.required, Validators.maxLength(30)]],
    lastname: ['', [Validators.required, Validators.maxLength(30)]],

    email: [
      '', 
    [ 
      Validators.required, 
      Validators.pattern('^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$')]
    ],
   
    contactNumber: [
      '',
      [
        Validators.required,
        Validators.pattern('^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-s./0-9]*$')
      ]
    ],

    // address: this.fb.group({
      address: [
        '', 
        [
          Validators.required, 
          Validators.maxLength(30)
        ]
      ],
    // }),

    password: [
      '', 
      [
        Validators.required,
        Validators.maxLength(20)
      ]
    ],

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
    email: [
      { type: 'required', message: 'Email is required' },
      { type: 'pattern', message: 'Please enter a valid email address' }
    ],

    contactNumber: [
      { type: 'required', message: 'Phone number is required' },
      { type: 'pattern', message: 'Please enter a valid phone number' }
    ],

    address: [
      { type: 'required', message: 'Address is required' },
      { type: 'maxlength', message: 'Your address cant be longer than 30 characters'}
    ],

    password: [
      { type: 'required', message: 'Password is required' },
      { type: 'maxlength', message: 'Password should not exceed at 20 characters'}
    
      
    ]
  };



  ngOnInit() {
    
  }

  registerRequest(){

    let data = {
      firstname : this.firstname.value,
      lastname: this.lastname.value,
      email: this.email.value,
      contactNumber: this.contactNumber.value,
      address: this.address.value,
      password: this.password.value
    }


    if(this.profileForm.valid){
      this._userservices.registerRequest(data).subscribe((res:any) => {
          this.router.navigate(['login']);
      });
    }
  }


  // signUp(){
  //   this.signupservice.signUpRequest(this.signupForm.value).subscribe((rest:any)=>{
  //     console.log(rest)
  //     this.router.navigate(["/login"])
  //   })


  
  // selectedBarangay(e){

  //   console.log(e);
  //   console.log(this.barangay);

  // }
  // onSubmit(){
  //   console.log(this.profileForm.value)
  // }

}