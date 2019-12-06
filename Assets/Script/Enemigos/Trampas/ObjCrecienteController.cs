using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ObjCrecienteController : MonoBehaviour
{
    public float maxSize = 3;
    public float contador = 0;
    private float sizeObj = 0;
    private Transform trans;
    void Start()
    {
        trans = GetComponent<Transform>();
    }
    
    void Update()
    {
        contador += Time.deltaTime;
        while(contador < maxSize)
        {
            trans.localScale = new Vector2(contador, trans.localScale.y);
        }

    }
}
