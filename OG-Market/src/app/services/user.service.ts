import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class UserService {
  
  constructor(private http: HttpClient) { }
  private apiUrl: string = 'http://localhost/OG-Marketplace/api_project';
  
  //login//
  loginRequest(data) {
    return this.http.post(this.apiUrl + '/login.php', data);
  }


  //register//
  registerRequest(data) {
    return this.http.post(this.apiUrl + '/Register_user.php', data);
  }
  //update//
  updateRequest(data) {
    return this.http.post(this.apiUrl + '/changeemail.php', data);
  }

  uploadProfile(formData){
    return this.http.post(this.apiUrl + '/upload_images.php', formData);
  }
  saveImage(data){
    return this.http.post(this.apiUrl + '/save_images.php', data);
  }
  getProduct(){
    return this.http.get(this.apiUrl + '/display.php');
  }
  getDetails(id){
    return this.http.get(this.apiUrl + '/getDetails.php?id='+id);
  }
  addOrder(data){
    return this.http.post(this.apiUrl + '/oderprod.php',data);
  }
}




