import { Component, OnInit } from '@angular/core';
import { AlertController } from '@ionic/angular';
import { LoadingController } from '@ionic/angular'; 

@Component({
  selector: 'app-confirm-order',
  templateUrl: './confirm-order.page.html',
  styleUrls: ['./confirm-order.page.scss'],
})
export class ConfirmOrderPage implements OnInit {

  constructor(private alertController: AlertController, public loadingCtrl: LoadingController) { }

  async presentAlert() {
    const alert = await this.alertController.create({
      cssClass: 'basic-alert',
      header: 'Order Confirmed',
      // subHeader: 'Alert Subtitle',
      // message: 'Order Confirmed',
      buttons: ['OK']
    });

    await alert.present();
  }

  showLoading() {  
    this.loadingCtrl.create({  
      message: 'Proccessing.....'   
      }).then((loading) => {  
       loading.present();{
      } 
       setTimeout(() => {   
         loading.dismiss();  
       }, 2000 );   
      });  
    } 

  ngOnInit() {
  }

}
