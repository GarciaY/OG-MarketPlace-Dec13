import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, Validators } from '@angular/forms';
import { UserService } from '../../services/user.service';
import { HttpClient,HttpErrorResponse } from '@angular/common/http';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  

  constructor(private http: HttpClient,private fb: FormBuilder,private _userservices:UserService, private router: Router) { }

  get email() {
    return this.profileForm.get('email');
  }

  get password() {
    return this.profileForm.get('password');
  }

  profileForm = this.fb.group({
    
    email: [
      '', 
    [ 
      Validators.required, 
      Validators.pattern('^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$')]
    ],

    password: [
      '', 
      [
        Validators.required,
        Validators.maxLength(20)
      ]
    ],
  });

  public errorMessages = {
    email: [
      { type: 'required', message: 'Email is required' },
      { type: 'pattern', message: 'Please enter a valid email address' }
    ],

    password: [
      { type: 'required', message: 'Password is required' },
      { type: 'maxlength', message: 'Password should not exceed at 20 characters'} 
    ]
  };

  ngOnInit() {
   
  }

  login(){
    this.profileForm=this.fb.group({
      email: this.email,
      password: this.password,
    });

    let data = {
      email: this.email.value,
      password: this.password.value
    }

    if(this.profileForm.valid){
      this._userservices.loginRequest(data).subscribe((res:any) => {
        if(res!=null){
          this.profileForm.reset();
          localStorage.setItem('user',JSON.stringify(res));
          this.router.navigate(['/home/listing']);
        }else{
          console.log("Wrong password or Email");
          this.router.navigate(['/login']);
        }
       
      });
    }
  }
}
