import { Component, OnInit } from '@angular/core';
import { FoodService } from '../../services/food.service';
import { CartService } from 'src/app/services/cart.service';
@Component({
  selector: 'app-transac-card',
  templateUrl: './transac-card.component.html',
  styleUrls: ['./transac-card.component.scss'],
})
export class TransacCardComponent implements OnInit {
  customerid: any;
  order: any;
  orders: any;
  orderid: any;

  constructor( private cartService: CartService,
    private _foodService:FoodService) { }

 
  ngOnInit() {
  this.getTransaction()
  }

  confirmDelete(ORDERID){
    console.log(ORDERID);
    this._foodService.confirmDelete(ORDERID).subscribe((res:any) => {
    console.log(res);
    });
  }



 getTransaction(){
  this.orderid = JSON.parse(localStorage.getItem('user')).customerid;
  this._foodService.getTransaction(this.orderid).subscribe((res:any) => {
    console.log("SUCCESS",res);
    this.orders = res;
 });

 }
}
