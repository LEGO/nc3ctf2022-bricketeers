# Assignment
You are given a file
```txt
效⁪楮獳牥瀠ꗃ丠牯灤汯湥‮楖쌠溸歳牥樠牥攠⁮潧⁤番⁬牦⁡敤⁮楫敮楳歳⁥楮獳慥摦汥湩⁧杯栠ꗃ敢⁲⁩썦犥攠⁮썭枦楴⁧潧⁤杯栠杹敧楬⁧番⹬਍楖洠摥敳摮牥氠杩⁥潶敲⁳畢⁤썰₥瑥映慬⹧䠠獵⁫썬玦搠瑥戠条썬溦⹳਍湽瑥慦汥橵江瑩牟污彫癩牟彥湡䭩䤭㍻乃਍楈獬搠湥朠浡敬䨠汵浥湡⁤慭杮⁥慧杮⹥਍
```

Loading it into cyberchef and running some "magic"..
Yields the following result

```
ÿþHej nisser pÃ¥ Nordpolen. Vi Ã¸nsker jer en god jul fra den kinesiske nisseafdeling og hÃ¥ber i fÃ¥r en mÃ¦gtig god og hyggelig jul.
Vi medsender lige vores bud pÃ¥ et flag. Husk lÃ¦s det baglÃ¦ns.
}netfaeluj_lit_ralk_iv_re_aniK-I{3CN
Hils den gamle Julemand mange gange.
```

# Solution
```csharp
var s = "}netfaeluj_lit_ralk_iv_re_aniK-I{3CN".ToArray();
Console.WriteLine( string.Join("",s.Reverse()) ); 
```
## Flag
`NC3{I-Kina_er_vi_klar_til_juleaften}`
