/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package toystore;

import java.io.BufferedReader;
import java.io.FileReader;

public class FileIn {

    public String readTxt(String archivo){
        String data="";
        try{
            BufferedReader bf =new BufferedReader(new FileReader(archivo));
            String temp ="";
            String bfReader;
            while((bfReader=bf.readLine())!=null){
                temp += temp+bfReader;
            }
            data=temp;
        }catch(Exception e){
            System.out.println(e);
        }
        return data;
    }
}
