import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FoodService } from 'src/app/services/food.service';
import { UserService } from '../../services/user.service';

@Component({
  selector: 'app-listing',
  templateUrl: './listing.page.html',
  styleUrls: ['./listing.page.scss'],
})
export class ListingPage implements OnInit {

 
  product: any;
  id: any;

  constructor(private router: Router,private foodService: FoodService, private _userservices:UserService) {}

  ngOnInit() {
    this.getProduct();
    // this.foods = this.foodService.getFoods();
  }
  
  prodDetails(){
    console.log(this.id);
    //this.router.navigate(['detail/'+this.id]);
  }

  getProduct() {
    this._userservices.getProduct().subscribe((res:any) => {
      console.log("SUCCESS");
      this.product = res;
   });
  }

  // goToDetailPage() {
  //   this.router.navigate(['detail']);
  // }
}


