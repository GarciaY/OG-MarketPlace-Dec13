import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () =>
      import('./home/home.module').then((m) => m.HomePageModule),
  },
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full',
  },
  {
    path: 'detail/:id/:price/:qty',
    loadChildren: () =>
      import('./screens/detail/detail.module').then((m) => m.DetailPageModule),
  },
  {
    path: 'login',
    loadChildren: () => import('./screens/login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'register',
    loadChildren: () => import('./screens/register/register.module').then( m => m.RegisterPageModule)
  },
  { path:  'login', loadChildren:  './auth/login/login.module#LoginPageModule' },
  {
    path: 'forgot-pass',
    loadChildren: () => import('./screens/forgot-pass/forgot-pass.module').then( m => m.ForgotPassPageModule)
  },
  {
    path: 'user-profile',
    loadChildren: () => import('./screens/user-profile/user-profile.module').then( m => m.UserProfilePageModule)
  },
  {
    path: 'transactions',
    loadChildren: () => import('./screens/transactions/transactions.module').then( m => m.TransactionsPageModule)
  },
  
  {
    path: 'change-name',
    loadChildren: () => import('./screens/edit-profile/change-name/change-name.module').then( m => m.ChangeNamePageModule)
  },
  {
    path: 'change-email',
    loadChildren: () => import('./screens/edit-profile/change-email/change-email.module').then( m => m.ChangeEmailPageModule)
  },
  {
    path: 'change-password',
    loadChildren: () => import('./screens/edit-profile/change-password/change-password.module').then( m => m.ChangePasswordPageModule)
  },
  {
    path: 'change-phone-number',
    loadChildren: () => import('./screens/edit-profile/change-phone-number/change-phone-number.module').then( m => m.ChangePhoneNumberPageModule)
  },
  {
    path: 'change-address',
    loadChildren: () => import('./screens/edit-profile/change-address/change-address.module').then( m => m.ChangeAddressPageModule)
  },
  {
    path: 'confirm-order',
    loadChildren: () => import('./screens/confirm-order/confirm-order.module').then( m => m.ConfirmOrderPageModule)
  },
  {
    path: 'view-transac',
    loadChildren: () => import('./screens/view-transac/view-transac.module').then( m => m.ViewTransacPageModule)
  },
  
  
  

  // {
  //   path: 'icon-button',
  //   loadChildren: () => import('./components/icon-button/icon-button.module').then( m => m.IconButtonPageModule)
  // },
  
  
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
  ],
  exports: [RouterModule],
})
export class AppRoutingModule {}
