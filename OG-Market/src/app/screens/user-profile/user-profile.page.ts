import { Component, OnInit } from '@angular/core';
import { AlertController } from '@ionic/angular';
import { UserService } from '../../services/user.service';

@Component({
  selector: 'app-user-profile',
  templateUrl: './user-profile.page.html',
  styleUrls: ['./user-profile.page.scss'],
})
export class UserProfilePage implements OnInit {

  file: any;
  customerid: any;
  fname: any;
  IMG_DIR: string;
  image: any;
  lname: any;
  mail: any;
  address: any;
  contactnumber: any;
   
 
  constructor(private alertController: AlertController,private _apiService: UserService) { }

  // async presentAlert() {
  //   const alert = await this.alertController.create({
  //     cssClass: 'basic-alert',
  //     header: 'Edit Avatar',
  //     // subHeader: 'Alert Subtitle',
  //     // message: 'Order Confirmed',
  //     buttons: ['Add Photo', 'Cancel']
  //   });

  //   await alert.present();
  // }
  ngOnInit() {
    this.displayProfile();
    this.getUser()
  }
  getUser(){
   
    this.fname = JSON.parse(localStorage.getItem('user')).firstname;
    this.lname = JSON.parse(localStorage.getItem('user')).lastname;
    this.mail = JSON.parse(localStorage.getItem('user')).email;
    this.address = JSON.parse(localStorage.getItem('user')).address;
    this.contactnumber = JSON.parse(localStorage.getItem('user')).contactnumber;
  
}

  selectFile(event){
    this.file = event.target.files[0];
 }


 displayProfile(){
   this.image = JSON.parse(localStorage.getItem('user')).userphoto;
  this.IMG_DIR = 'http://localhost/OG-Marketplace/OG-Marketplace/src/assets/images/user_image/' + this.image;
 }

 uploadProfile(){
    this.customerid = JSON.parse(localStorage.getItem('user')).customerid;

    const formData = new FormData();
    formData.append('file',this.file,this.file.name);

      this._apiService.uploadProfile(formData).subscribe((res:any) => {
        this.fname  = res;
        let data = {
          fname: this.fname,
          id : this.customerid
        }
        console.log(data);
         this._apiService.saveImage(data).subscribe((response:any) => {
            console.log("SUCCESS",response);
            localStorage.removeItem('user');
            localStorage.setItem('user', JSON.stringify(response));
          });
         });
    }

}
