using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MosOculController : MonoBehaviour
{
    public GameObject objeto;
    public float contador = 0f;
    
    void Start()
    {
        objeto.SetActive(true);
    }
    void Update()
    {
        
        contador += Time.deltaTime;        
        if(contador < 4)
        {
            objeto.SetActive(false);
        }else if(contador > 3 && contador < 6)
        {
            objeto.SetActive(true);
        }else if(contador > 5.5) {
            contador = 0;
        } 
    }
    
}
