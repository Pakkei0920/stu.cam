# @stu.cam
  本專題基於 http://wait.stu.edu.tw/ 及 樹德科技大學-電算中心網路應用組 資源下進行編譯及開發；
  <p>版權基於原網站創作人，本專案無意侵權，依著配合著作權人之通知會立即取下涉嫌侵權之內容。
  <p>原代碼僅供學術研究、學習及教學用途。
    
****

<p>專題網站：
<p>https://loop.paki91.com/CAM-6/index2.php
<p>2023.11.13：https://loop.paki91.com/CAM-6/output_20231113.mp4
  
****

  流程圖：
  ![loop paki91 com](https://github.com/Pakkei0920/stu.cam/assets/106027537/ebb289c2-12b7-4d8b-bec0-e1661b87c3e4)

  FFMPEG硬體調用狀況:
  ![test](https://github.com/Pakkei0920/stu.cam/assets/106027537/d35f6590-5c74-4b1b-9693-a2fbc7c3fc59)


****

  <p>Q&A:
  <p>1.因可能多次訪問監控畫面內容，或網絡不穩定會導致出現獲取圖片失敗而報錯解決方法？
    <p>  如果出現錯誤，例如圖片保存失敗(下圖)導致無法運作會跳出While循環，但同時會接入HTML的meta http-equiv="refresh" content="0.5"
    <p>  瀏覽器會自動刷新網頁，需要注意的是PHP需要設置時間間距，不然會不斷dos他方服務器。
       <p>2.相片水印怎麼操作？
         <p>從網上資料查詢可以使用PHP的GD 函式庫的imagettftext函數輸出文字，然後在XAMPP本機端調試日期時間的X、Y坐標。
   <p>3.有遇到什麼其他的困難？
    <p>  本以為ffmpeg程序有問題，後來發現為http user權限問題。
      
![1](https://github.com/Pakkei0920/stu.cam/assets/106027537/32d2d7ad-1c60-43b3-82a3-251c15e5c380)
      
![QQ拼音截图20231111211536](https://github.com/Pakkei0920/stu.cam/assets/106027537/bb41c2d1-aab5-4389-b1b5-487f4e8936d5)

![QQ拼音截图20231112121415](https://github.com/Pakkei0920/stu.cam/assets/106027537/9d977e69-7f2d-4dc4-8b6f-6ebb9a4dfb8b)


