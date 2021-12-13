import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { CartItem } from 'src/app/models/cart-item.model';
import { Food } from 'src/app/models/food.model';
import { CartService } from 'src/app/services/cart.service';
import { FoodService } from 'src/app/services/food.service';

import { UserService } from '../../services/user.service';

@Component({
  selector: 'app-detail',
  templateUrl: './detail.page.html',
  styleUrls: ['./detail.page.scss'],
})
export class DetailPage implements OnInit {
  id: any;
  prodDetail: any;
  kilo: any;
  total: any;
  quantity: any;
  price: any;
  details: any;
  qty: any;
  user_id: any;

  constructor(
    private activatedRoute: ActivatedRoute,
    private toastCtrl: ToastController,
    private _userservices:UserService
  ) {
    //get data from listing page
    this.id = this.activatedRoute.snapshot.paramMap.get('id');
    this.price = this.activatedRoute.snapshot.paramMap.get('price');
    this.qty = this.activatedRoute.snapshot.paramMap.get('qty');
  }

  ngOnInit() {
    this.getDetails();
    this.user_id = JSON.parse(localStorage.getItem('user')).customerid;
  }

  //display product details
  getDetails(){
    console.log(this.id);
    this._userservices.getDetails(this.id).subscribe((res:any) => {
      console.log("SUCCESS");
      this.prodDetail = res;
   });
  }

  //dropdown menu for kilo
  public optionsFn(): void {

  //condition in finding the total prize of an item/goods
      if(this.kilo == "1/2"){
      
          this.quantity = 2;
          this.total = this.price / this.quantity;
          console.log(this.total);
      
      }else if(this.kilo == "1/4"){
      
        this.quantity = 4;
        this.total = this.price / this.quantity;
        console.log(this.total);
      
      }else if(this.kilo == "3/4"){
      
        this.quantity = 4;
        this.total = this.price - (this.price / this.quantity) ;
        console.log(this.total);
      
      }else if(this.kilo == "1"){
      
        this.quantity = 1;
        this.total = this.price / this.quantity;
        console.log(this.total);
      
      }else if(this.kilo == "2"){
      
        this.quantity = 2;
        this.total = this.price * this.quantity;
        console.log(this.total);
      
      }else{
        console.log('kilo is not availabe');
      }
    }

  //add orders
  addItemToCart() {

      let data = {
        id:this.user_id,
        quantity:this.kilo,
        price:this.total,
        proid:this.id
      }
      
      console.log(data);
        this._userservices.addOrder(data).subscribe((res:any) => {
          console.log(res);
        });
  }
  async presentToast() {
    const toast = await this.toastCtrl.create({
      message: 'Food added to the cart',
      mode: 'ios',
      duration: 1000,
      position: 'top',
    });

    toast.present();
  }
}
