import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class FoodService {
  
  
  constructor(private http: HttpClient) { }
  private apiUrl: string = 'http://localhost/OG-Marketplace/api_project';
  
  //get orders//
  getOrders(customerid) {
    return this.http.get(this.apiUrl + '/getOrder.php?id='+ customerid);
  }
  getImages(customerid) {
    return this.http.get(this.apiUrl + '/getImages.php?id='+ customerid);
  }
  delete(orderid){
    return this.http.get(this.apiUrl + '/delete.php?id='+ orderid);
  }
  checkout(orderid){
    return this.http.get(this.apiUrl + '/checkout.php?id='+ orderid);
  }
  getTransaction(orderid){
    return this.http.get(this.apiUrl + '/transachistory.php?id=' + orderid);
  }
  confirmDelete(orderid){
    return this.http.get(this.apiUrl + '/delete.php?id=' + orderid);
  }
}

