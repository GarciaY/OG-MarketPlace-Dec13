import { Component, OnInit } from '@angular/core';
import { AlertController } from '@ionic/angular';
import { Observable } from 'rxjs';
import { CartItem } from 'src/app/models/cart-item.model';
import { CartService } from 'src/app/services/cart.service';
import { FoodService } from '../../services/food.service';
import { Photo } from '@capacitor/camera';
import { Directory, Filesystem } from '@capacitor/filesystem';
import { LoadingController, Platform } from '@ionic/angular';
import { DecimalPipe } from '@angular/common';

  
  const IMAGE_DIR = 'IMAGES';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.page.html',
  styleUrls: ['./cart.page.scss'],
})
export class CartPage implements OnInit {
 
  orders: any;
  customerid: any;
  image_url: any;
  image: any;
  
  images: any[];
  prodimages: any;
  arr: any[];
  total: any;
  id: any;


  constructor(
    private cartService: CartService,
    private alertCtrl: AlertController,
    private _foodService:FoodService
  ) {}

  ngOnInit() {
    this.displayOrders();
    this.image = this.image_url;
    
    

  }

  // onIncrease(item: CartItem) {
  //   this.cartService.changeQty(1, item.id);
  // }

  // onDecrease(item: CartItem) {
  //   if (item.quantity === 1) this.removeFromCart(item);
  //   else this.cartService.changeQty(-1, item.id);
  // }

  // async removeFromCart(item: CartItem) {
  //   const alert = await this.alertCtrl.create({
  //     header: 'Remove',
  //     message: 'Are you sure you want to remove?',
  //     buttons: [
  //       {
  //         text: 'Yes',
  //         handler: () => this.cartService.removeItem(item.id),
  //       },
  //       {
  //         text: 'No',
  //       },
  //     ],
  //   });

  //   alert.present();
  // }

  displayOrders(){
    

    this.customerid = JSON.parse(localStorage.getItem('user')).customerid;

    console.log(this.customerid );
    this._foodService.getOrders(this.customerid).subscribe((res:any) => {
      console.log("SUCCESS",res);
      this.orders = res;
      this.total = 0;
      for(let order of this.orders){
        this.total = parseInt(order.ORDEREDPRICE) + this.total;
        console.log(this.total);
      }
   });

   this._foodService.getImages(this.customerid).subscribe((image:any) => {
    console.log("SUCCESS",image);
    this.prodimages = image;
 });
  }
  removeFromCart(ORDERID){
    console.log("SUCCESS",ORDERID);
    this._foodService.delete(ORDERID).subscribe((res:any) => {
    console.log(res);
    });
  }
  checkout(){
    
    this._foodService.checkout(this.customerid).subscribe((res:any) => {
      console.log(res);
      });

  }


}
