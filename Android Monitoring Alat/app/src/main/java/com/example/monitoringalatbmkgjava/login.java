package com.example.monitoringalatbmkgjava;

import androidx.activity.result.ActivityResult;
import androidx.activity.result.ActivityResultCallback;
import androidx.activity.result.ActivityResultLauncher;
import androidx.activity.result.contract.ActivityResultContracts;
import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.ClipData;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.nfc.Tag;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.util.Log;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class login extends AppCompatActivity {
    private static final String TAG = "login";
    WebView webView;
    ValueCallback<Uri[]> f_string;
    String cam_path;
    ActivityResultLauncher<Intent> myARL = registerForActivityResult(new ActivityResultContracts.StartActivityForResult(), new ActivityResultCallback<ActivityResult>() {
        @Override
        public void onActivityResult(ActivityResult result) {
            Uri[] results = null;
            if (result.getResultCode() == Activity.RESULT_CANCELED){

                f_string.onReceiveValue(null);
                return;

            }
            if (result.getResultCode() == Activity.RESULT_OK) {

                if (null == f_string) {
                    return;
                }
                ClipData clipData;
                String stringData;
                try {
                    clipData = result.getData().getClipData();
                    stringData = result.getData().getDataString();
                }catch (Exception e){
                    clipData = null;
                    stringData = null;
                }

                if (clipData == null && stringData == null && cam_path != null) {
                    results = new Uri[]{Uri.parse(cam_path)};
                } else {
                    if (null != clipData) { // checking if multiple files selected or not
                        Log.d(TAG, "clipData: "+clipData);
                        final int numSelectedFiles = clipData.getItemCount();
                        results = new Uri[numSelectedFiles];
                        for (int i = 0; i < clipData.getItemCount(); i++) {
                            results[i] = clipData.getItemAt(i).getUri();
                        }
                }else {
                        try {
                            assert result.getData() != null;
                            Bitmap cam_photo = (Bitmap) result.getData().getExtras().get("data");
                            ByteArrayOutputStream bytes = new ByteArrayOutputStream();
                            cam_photo.compress(Bitmap.CompressFormat.JPEG,100,bytes);
                            stringData = MediaStore.Images.Media.insertImage(getContentResolver(), cam_photo, null, null);
                        }catch (Exception ignored){}

                        results = new Uri[]{Uri.parse(stringData)};
                        }
                    }
            }

            f_string.onReceiveValue(results);
            f_string = null;
        }
    });
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        webView=(WebView)findViewById(R.id.WV);
        WebSettings mWebSettings = webView.getSettings();
        mWebSettings.setJavaScriptEnabled(true);
        mWebSettings.setAllowFileAccess(true);
        mWebSettings.setAllowFileAccessFromFileURLs(true);
        mWebSettings.setAllowUniversalAccessFromFileURLs(true);
        mWebSettings.setUseWideViewPort(true);
        mWebSettings.setDomStorageEnabled(true);
        webView.setWebViewClient(new WebViewClient(){
            private WebView view;

            public boolean shouldOvverideUrlLoading(WebView view, String Url) {
                view.loadUrl(Url);
                return true;
            }
        });
        webView.loadUrl("https://testingaplikasimonitoringalat.000webhostapp.com/login.php");
        webView.setWebChromeClient(new WebChromeClient(){
            public boolean onShowFileChooser(WebView webView, ValueCallback<Uri[]> filePathCallback, FileChooserParams fileChooserParams) {
                f_string = filePathCallback;
                Intent takePictureIntent = null;
                takePictureIntent = new Intent (MediaStore.ACTION_IMAGE_CAPTURE);
                if (takePictureIntent.resolveActivity(login.this.getPackageManager())!= null) {
                    File photoFile = null;
                    try {
                        photoFile = create_images();
                        takePictureIntent.putExtra("PhotoPath", cam_path);
                    }catch (IOException ex) {
                        Log.e(TAG, "Image file creation file", ex);
                    }
                    if (photoFile != null) {
                        cam_path = "file:" + photoFile.getAbsolutePath();
                        takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT, Uri.fromFile(photoFile));
                    }else {
                        takePictureIntent = null;
                    }
              }
                Intent contentSelectionIntent = new Intent (Intent.ACTION_GET_CONTENT);
                contentSelectionIntent.addCategory(Intent.CATEGORY_OPENABLE);
                contentSelectionIntent.setType("*/*");
                Intent [] intentArray;
                intentArray = new Intent[]{takePictureIntent};
                Intent chooserIntent = new Intent(Intent.ACTION_CHOOSER);
                chooserIntent.putExtra(Intent.EXTRA_INTENT, contentSelectionIntent);
                chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS, intentArray);
                myARL.launch(chooserIntent);
                return true;
            }
        });
    }

    private File create_images() throws IOException{
        @SuppressLint("SimpleDateFormat")
                String file_name = new SimpleDateFormat("yyyy_mm_ss").format(new Date());
        String new_name = "file_"+file_name+"_";
        File sd_directory = getExternalFilesDir(Environment.DIRECTORY_PICTURES);
        return File.createTempFile(new_name, ".jpg", sd_directory);
    }
}