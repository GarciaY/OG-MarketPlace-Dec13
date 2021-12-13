import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ShopButtonComponent } from './shop-button.component';
import { IonicModule } from '@ionic/angular';

@NgModule({
  declarations: [ShopButtonComponent],
  imports: [CommonModule, IonicModule],
  exports: [ShopButtonComponent],
})
export class ShopButtonModule {}
