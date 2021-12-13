import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent implements OnInit {
  firstname: any;
  lastname: any;
  email: any;
  address: any;
  contactnumber: any;
 
  constructor(private router: Router) {}

  onLogout() {
    this.router.navigate(['/login']);
    localStorage.clear();
  }

  ngOnInit()
  {
    this.getUser()
  }

  getUser(){
   
      this.firstname = JSON.parse(localStorage.getItem('user')).firstname;
      this.lastname = JSON.parse(localStorage.getItem('user')).lastname;
      this.email = JSON.parse(localStorage.getItem('user')).email;
      this.address = JSON.parse(localStorage.getItem('user')).address;
      this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
    
  }


}


